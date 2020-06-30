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
class VerifyAssetsController extends BaseController
{
    /**
     * @var VerifyAssetsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return VerifyAssetsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * 
     * Generate a Verification of Assets (VOA) report for all checking, savings, money market, and
     * investment accounts for the given customer. This service retrieves up to six months of transaction
     * history for each account and uses this information to generate the VOA report.
     *
     * This is a premium service. The billing rate is the variable rate for Verification of Assets under
     * the current subscription plan. The billable event is the successful generation of a VOA report.
     *
     * HTTP status of 202 (Accepted) means the report is being generated. When the report is finished, a
     * notification will be sent to the specified report callback URL, if specified.
     *
     * If no account of type of checking, savings, money market, or investment is found, the service will
     * return HTTP 400 (Bad Request).
     *
     * @param integer                  $customerId   Finicity ID for the customer
     * @param string                   $accept       Replace 'json' with 'xml' if preferred
     * @param string                   $contentType  Replace 'json' with 'xml' if preferred
     * @param string                   $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded).
     * @param integer                  $fromDate     (optional) The fromDate parameter is an Epoch Timestamp (in
     *                                               seconds), such as ?1494449017?. Without this parameter, the report
     *                                               defaults to 6 months if available. Example: ?fromDate={fromDate}
     *                                               If included, the epoch timestamp should be 10 digits long and be
     *                                               within two years of the present day. Extending the epoch timestamp
     *                                               beyond 10 digits will default back to six months of data.  This
     *                                               query is optional
     * @param Models\ReportConstraints $body         (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateVOAReport(
        $customerId,
        $accept,
        $contentType,
        $callbackUrl = null,
        $fromDate = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/voa';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl'  => $callbackUrl,
            'fromDate'     => $fromDate,
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

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateVOAReportResponse');
    }

    /**
     * 
     * Generate a Verification of Assets with Income (VOAH) report for all checking, savings, money market,
     * and investment accounts for the given customer. This service retrieves up to twenty-four months of
     * transaction history for each account and uses this information to generate the VOA with Income
     * report.
     *
     * This is a premium service. The billing rate is the variable rate for VOA with Income under the
     * current subscription plan. The billable event is the successful generation of a VOA with Income
     * report.
     *
     * HTTP status of 202 (Accepted) means the report is being generated. When the report is finished, a
     * notification will be sent to the specified report callback URL, if specified.
     *
     * If no account of type of checking, savings, money market, or investment is found, the service will
     * return HTTP 400 (Bad Request).
     *
     * @param integer                  $customerId   Finicity Id of the customer
     * @param string                   $accept       Replace 'json' with 'xml' if preferred
     * @param string                   $contentType  Replace 'json' with 'xml' if preferred
     * @param string                   $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded).
     * @param integer                  $fromDate     (optional) The fromDate parameter is an Epoch Timestamp (in
     *                                               seconds), such as ?1494449017?. Without this parameter, the report
     *                                               defaults to 2 years if available. Example: ?fromDate={fromDate} If
     *                                               included, the epoch timestamp should be 10 digits long and be
     *                                               within two years of the present day. Extending the epoch timestamp
     *                                               beyond 10 digits will default back to 2 years of data.  This query
     *                                               is optional
     * @param Models\ReportConstraints $body         (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateVOAWithIncomeReportV2(
        $customerId,
        $accept,
        $contentType,
        $callbackUrl = null,
        $fromDate = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/voaHistory';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl'  => $callbackUrl,
            'fromDate'     => $fromDate,
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

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateVOAWithIncomeReportResponse');
    }

    /**
     * Generate a Prequalification Report (preQualVoa) for all checking, savings, money market, and
     * investment accounts for the given customer. This service retrieves account and owner information as
     * well as the number of NSFs for any account that is a checking account for the customer.
     *
     * This is a premium service. The billing rate is billed per report for the Prequalification report.
     *
     * After making this call, the client app may wait for a notification to be sent to the Report Listener
     * Service, or it may enter a loop, which should wait 20 seconds and then call the service Get Report
     * to see if the report is finished. While the report is being generated, Get Report will return a
     * minimal report with status inProgress. The loop should repeat every 20 seconds until Get Report
     * returns a different status.
     *
     * If using the listener service, the following format must be followed and the webhook must respond to
     * the Finicity API with a 200 series code:
     *
     * https://api.finicity.com/decisioning/v1/customers/[customerId]/preQualVoa?callbackUrl=[webhookUrl]
     *
     * HTTP status of 202 (Accepted) means the report is being generated. When the report is finished, a
     * notification will be sent to the specified report callback URL, if specified.
     *
     * If no account type of checking, savings, money market, or investment is found, the service will
     * return HTTP 400 (Bad Request).
     *
     * @param integer                  $customerId   Finicity's ID of the customer
     * @param string                   $accept       Replace 'json' with 'xml' if preferred
     * @param string                   $contentType  Replace 'json' with 'xml' if preferred
     * @param string                   $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded).
     * @param Models\ReportConstraints $body         (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generatePrequalificationReport(
        $customerId,
        $accept,
        $contentType,
        $callbackUrl = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/preQualVoa';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl'  => $callbackUrl,
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

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GeneratePrequalificationReportResponse');
    }

    /**
     * Generate Asset Summary report (assetSummary) for all checking, savings, money market, and investment
     * accounts for the given customer. This service retrieves account and owner information as well as the
     * number of NSFs for any account that is a checking account for the customer.
     *
     * This is a premium service. The billing rate is billed per report for the Asset Summary report.
     *
     * After making this call, the client app may wait for a notification to be sent to the Report Listener
     * Service, or it may enter a loop, which should wait 20 seconds and then call the service Get Report
     * to see if the report is finished. While the report is being generated, Get Report will return a
     * minimal report with status inProgress. The loop should repeat every 20 seconds until Get Report
     * returns a different status.
     *
     * If using the listener service, the following format must be followed and the webhook must respond to
     * the Finicity API with a 200 series code:
     *
     * https://api.finicity.com/decisioning/v1/customers/[customerId]/assetSummary?
     * callbackUrl=[webhookUrl]
     *
     * HTTP status of 202 (Accepted) means the report is being generated. When the report is finished, a
     * notification will be sent to the specified report callback URL, if specified.
     *
     * If no account type of checking, savings, money market, or investment is found, the service will
     * return HTTP 400 (Bad Request).
     *
     * @param integer                  $customerId   Finicity's ID of the customer
     * @param string                   $accept       Replace 'json' with 'xml' if preferred
     * @param string                   $contentType  Replace 'json' with 'xml' if preferred
     * @param string                   $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded).
     * @param Models\ReportConstraints $body         (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateAssetSummaryReport(
        $customerId,
        $accept,
        $contentType,
        $callbackUrl = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/assetSummary';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl'  => $callbackUrl,
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

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateAssetSummaryReportResponse');
    }
}
