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
class VerifyIncomeAndEmploymentController extends BaseController
{
    /**
     * @var VerifyIncomeAndEmploymentController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return VerifyIncomeAndEmploymentController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Generate Pay Statement Extraction Report for the given customer. This service accepts asset IDs of
     * the stored pay statements to generate a Pay Statement Extraction Report.
     *
     * This is a premium service. The billing rate is the variable rate for Pay Statement Extraction Report
     * under the current subscription plan. The billable event is the successful generation of a Pay
     * Statement Extraction Report.
     *
     * The service returns immediately with status HTTP 202 (Accepted) if successful. When finished, a
     * notification will be sent to the specified report callback URL, if specified.
     *
     * After making this call, the client app may wait for a notification to be sent to the Report Listener
     * Service, or it may enter a loop, which should wait 20 seconds and then call the service Get Report
     * to see if the report is finished. While the report is being generated, Get Report will return a
     * minimal report including status inProgress. The loop should repeat every 20 seconds until Get Report
     * returns a different status.
     *
     * The service will return HTTP 400 (Bad Request) if the asset ID does not exist within Finicity?s
     * system.
     *
     * @param integer                        $customerId   Finicity ID of the customer
     * @param string                         $accept       Replace 'json' with 'xml' if preferred
     * @param string                         $contentType  Replace 'json' with 'xml' if preferred
     * @param Models\PayStatementConstraints $body         TODO: type description here
     * @param string                         $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                                     (optional, must be URL-encoded).
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generatePayStatementReport(
        $customerId,
        $accept,
        $contentType,
        $body,
        $callbackUrl = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/payStatement';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GeneratePayStatementReportResponse');
    }

    /**
     * Generate a VOIE TXVerify with Interview report for all checking and savings under the given customer.
     * This service retrieves up to two years of transaction history for the given accounts. It then uses
     * this information as well as the provided paystubs to generate the VOIE TXVerify report.
     *
     * This is a premium service. The billing rate is the variable rate for VOIE TXVerify under the current
     * subscription plan. The billable event is the successful generation of a VOIE TXVerify Report.
     *
     * The service returns immediately with status HTTP 202 (Accepted). When finished, a notification will
     * be sent to the specified report callback URL, if specified.
     *
     * After making this call, the client app may wait for a notification to be sent to the Report Listener
     * Service, or it may enter a loop, which should wait 20 seconds and then call the service Get Report
     * to see if the report is finished. While the report is being generated, Get Report will return a
     * minimal report including status inProgress. The loop should repeat every 20 seconds until Get Report
     * returns a different status.
     *
     * When the call cannot be processed due to invalid input, the service will return HTTP 400 (Bad
     * Request).
     *
     * @param integer                        $customerId   Finicity ID for the customer
     * @param string                         $accept       application/json or application/xml
     * @param string                         $contentType  application/json or application/xml
     * @param Models\VOIETxverifyConstraints $body         TODO: type description here
     * @param string                         $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                                     (optional, must be URL-encoded).
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateVOIE_txverify_Report(
        $customerId,
        $accept,
        $contentType,
        $body,
        $callbackUrl = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/decisioning/v2/customers/{customerId}/voieTxVerify/withInterview';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateVOIETxverifyReportResponse');
    }
}
