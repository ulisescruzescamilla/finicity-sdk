<?php

namespace FinicityAPILib\Controllers;

use FinicityAPILib\APIException;
use FinicityAPILib\APIHelper;
use FinicityAPILib\Configuration;
use FinicityAPILib\Models;
use FinicityAPILib\Exceptions;
use FinicityAPILib\Http\HttpRequest;
use FinicityAPILib\Http\HttpResponse;
use FinicityAPILib\Http\HttpMethod;
use FinicityAPILib\Http\HttpContext;
use FinicityAPILib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class GetReportsByCustomerController extends BaseController
{
    /**
     * @var GetReportsByCustomerController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return GetReportsByCustomerController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AuditableReport');
    }

    /**
     * Get a list of reports that have been generated for the given customer.
     *
     * The status fields in the returned list will contain inProgress, failure, or success. If a status
     * shows inProgress, wait 20 seconds and then call again.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getReportsByCustomer(
        $customerId,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\ReportSummaries');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getVOIE_txverify_ReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\VOIETxverifyReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report (UUID with max length 32 characters)
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getVOIReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\VOIReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getVOAWithIncomeReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\VOAWithIncomeReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPrequalificationVOAReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\PrequalificationReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAssetSummaryReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AssetSummaryReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getVOAReportByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\VOAReportRecord');
    }

    /**
     * Get a report that has been generated by calling one of the Generate Report services.
     *
     * The report's status field will contain inProgress, failure, or success. If the status shows
     * inProgress, the client app should wait 20 seconds and then call again to see if the report is
     * finished.
     *
     * See Permissible Purpose Codes for a list of permissible purposes for retrieving a report.
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $reportId     Finicity’s ID of the report
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @param string  $onBehalfOf   (optional) The name of the entity you are retrieving the report on behalf of.
     * @param string  $purpose      (optional) 2-digit code from Permissible Purpose Codes, specifying the reason for
     *                              retrieving this report.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPayStatementExtractionByCustomer(
        $customerId,
        $reportId,
        $accept,
        $contentType,
        $onBehalfOf = null,
        $purpose = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $reportId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/reports/{reportId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'reportId'     => $reportId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'onBehalfOf'   => $onBehalfOf,
            'purpose'      => $purpose,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept,
            'Content-Type'    => $contentType
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\PayStatementReportRecord');
    }
}
