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
class VerifyEmploymentController extends BaseController
{
    /**
     * @var VerifyEmploymentController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return VerifyEmploymentController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * **Premium Service**: A billable event when the API response is successful.
     *
     * **MVS Implementation Options**: Direct API Integration
     *
     * Used as a complementary report to the VOIE-Payroll report. This report is used to fulfill the pre-
     * close VOE requirements. It retrieves the customer’s employment details and employment status through
     * the payroll source without any income information.
     *
     * To generate this report, pass the values from the customer `SSN`, `DOB`, and the `reportId` from the
     * first VOIE-Payroll report generated after the Connect session.
     *
     * **After the call**
     * * Returns status HTTP 202 (accepted)
     * * A notification gets sent to the report callback URL if specified.
     * * The application making the call receives a notification sent by the Report Listener Service
     * indicating the report is ready.
     *
     * Or it could enter a loop, wait about 20 seconds, and then call the service. Use the Get Report
     * API to check if the report is finished.
     *
     * @param integer                         $customerId   Finicity ID for the customer
     * @param string                          $accept       application/json
     * @param string                          $contentType  application/json
     * @param Models\PayrollReportConstraints $body         TODO: type description here
     * @param string                          $callbackUrl  (optional) The Report Listener URL to receive notifications
     *                                                      (optional, must be URL-encoded).
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateVOEPayrollReport(
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
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/voePayroll';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateVOEPayrollReportResponse');
    }

    /**
     * **Premium Service**: A billable event when the API response is successful.
     *
     * **MVS-Direct integration developers only**
     *
     * Used as a complimentary report to the VOA with Income and VOIE - Paystub (with TXVerify) reports.
     * It's used to fulfill the pre-close VOE requirements.
     *
     * It retrieves the latest credit transaction information from the borrower’s connected bank accounts
     * and groups them into income streams so that you can view their payment history to ensure a direct
     * deport was made within the expected cadence. The report displays transaction descriptions without
     * any dollar amounts so that income re-verification isn’t necessary.
     *
     * **After the call**
     * * Returns status HTTP 202 (accepted)
     * * A notification gets sent to the report callback URL if specified.
     * * The application making the call receives a notification sent by the Report Listener Service
     * indicating the report is ready.
     *
     * Or it could enter a loop, wait about 20 seconds, and then call the service. Use the Get Report
     * API to check if the report is finished.
     *
     * @param integer                                  $customerId   Finicity Id of the customer
     * @param string                                   $accept       Replace 'json' with 'xml' if preferred
     * @param string                                   $contentType  Replace 'json' with 'xml' if preferred
     * @param string                                   $callbackUrl  (optional) The Report Listener URL to receive
     *                                                               notifications (optional, must be URL-encoded).
     * @param integer                                  $fromDate     (optional) The fromDate parameter is an Epoch
     *                                                               Timestamp (in seconds), such as ?1494449017.
     *                                                               Without this parameter, the report defaults to 120
     *                                                               days if available. This field will limit the
     *                                                               amount of credit transactions included in the
     *                                                               report up to the date specified, up to 120 days.
     *                                                               <br> Example: ?fromDate={fromDate} <br> If
     *                                                               included, the epoch timestamp should be 10 digits
     *                                                               long and be within 120 days of the present day.
     *                                                               Extending the epoch timestamp beyond 10 digits or
     *                                                               beyond 120 days from the present date will default
     *                                                               back to 120 days of data. This query is optional.
     * @param Models\VOETransactionsRequestConstraints $body         (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateVOETransactionsReport(
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
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/voeTransactions';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateVOETransactionsReportResponse');
    }
}
