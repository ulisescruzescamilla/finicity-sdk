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
class CashFlowController extends BaseController
{
    /**
     * @var CashFlowController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return CashFlowController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Generate a Cash Flow Report (Business) report for all checking and savings under the given Customer.
     * This service retrieves up to two years of transaction history for the given account. It then uses
     * this information to generate the CFR report. A consumer is not required to generate this report.
     *
     * This report is not provided under FCRA rules, and this report is not available in the Finicity
     * Consumer Portal for the borrower to view.
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
     * If no account of type of checking or savings is found, the service will return HTTP 400 (Bad
     * Request).
     *
     * @param integer                   $customerId  ID of the customer
     * @param string                    $accept      JSON or XML output.
     * @param string                    $callbackUrl (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded)
     * @param integer                   $fromDate    (optional) The `fromDate` param is an Epoch Timestamp (in seconds).
     *                                               It must be 10 digits long and within two years of the present day.
     *                                               If fromDate is not used or it’s longer than 10 digits, the cash
     *                                               flow report history defaults to 6 months of data if available.
     * @param Models\RequestConstraints $body        (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateCashFlowReportBusiness(
        $customerId,
        $accept,
        $callbackUrl = null,
        $fromDate = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/cashFlowBusiness';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'  => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl' => $callbackUrl,
            'fromDate'    => $fromDate,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'application/json; charset=utf-8',
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept
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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateCashFlowReportBusinessResponse');
    }

    /**
     * Generate a Cash Flow Report (Personal) report for all checking and savings under the given Customer.
     * This service retrieves up to two years of transaction history for the given account. It then uses
     * this information to generate the CFR report.
     *
     * This report is provided under FCRA rules, with Finicity acting as the CRA (Consumer Reporting
     * Agency).  If an individual account is included in the report - for example, with an individual
     * acting as an personal guarantor on the loan - then this version of the report should be used. In
     * case of an adverse action on the loan where the decision was based on this report, then the borrower
     * can be referred to the Finicity Consumer Portal (https://consumer.finicityreports.com) where they
     * can view this report and submit a dispute if they feel any information in this report is inaccurate.
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
     * A Report Consumer must be created for the given Customer before calling this service. If no Report
     * Consumer has been created, the service will return HTTP 400 (Bad Request).
     *
     * If no account of type of checking or savings is found, the service will return HTTP 400 (Bad
     * Request).
     *
     * @param integer                   $customerId  ID of the customer
     * @param string                    $accept      JSON or XML output.
     * @param string                    $callbackUrl (optional) The Report Listener URL to receive notifications
     *                                               (optional, must be URL-encoded)
     * @param integer                   $fromDate    (optional) The `fromDate` param is an Epoch Timestamp (in seconds).
     *                                               It must be 10 digits long and within two years of the present day.
     *                                               If fromDate is not used or it’s longer than 10 digits, the cash
     *                                               flow report history defaults to 6 months of data if available.
     * @param Models\RequestConstraints $body        (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateCashFlowReportPersonal(
        $customerId,
        $accept,
        $callbackUrl = null,
        $fromDate = null,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/cashFlowPersonal';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'  => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl' => $callbackUrl,
            'fromDate'    => $fromDate,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'application/json; charset=utf-8',
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept
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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateCashFlowReportPersonalResponse');
    }
}
