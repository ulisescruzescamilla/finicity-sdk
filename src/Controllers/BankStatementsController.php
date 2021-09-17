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
class BankStatementsController extends BaseController
{
    /**
     * @var BankStatementsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return BankStatementsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Retrieve the customer's bank statements in PDF format. Up to 24 months of history is available
     * depending on the financial institution. Since this is a premium service, charges incur per each
     * successful statement retrieved.
     *
     * Our list of [Supported Institutions](https://docs.finicity.com/institutions/) confirms that you can
     * retrieve statements for the following account types:
     * * Checking
     * * Savings
     * * Money market
     * * CDs
     * * Investments
     * * Mortgage
     * * Credit cards
     * * Loans
     * * Line of credit
     *
     * ** Set request timeout **:  We recommend setting the timeout to 180 seconds to allow plenty of time
     * for a response.
     *
     * ** Error codes **
     * * **HTTP 200**: Success. The response is a binary string that you can save as a PDF file.
     *
     * * ** HTTP 203 **: The response contains an MFA challenge question in JSON format.
     * Contact one of our system engineers for help in resolving this error.
     *
     * @param string  $accept     application/pdf, application/json (the document will be in PDF format, but errors
     *                            will be JSON)
     * @param integer $customerId Finicity ‘s ID for the customer who owns the account
     * @param integer $accountId  Finicity’s ID of the account
     * @param integer $index      (optional) Request statements from 1- 24. By default, 1 is the most recent statement.
     *                            Increase the index value to count back (by month) and retrieve its most recent
     *                            statement.
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccountStatement(
        $accept,
        $customerId,
        $accountId,
        $index = 1
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/statement';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
            'accountId'  => $accountId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'index'      => (null != $index) ? $index : 1,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => $accept
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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Generate a Statement Report report for specified accounts under the given customer. This report
     * requires a consumer.
     *
     * The service returns immediately with status HTTP 202 (Accepted). When finished, a notification will
     * be sent to the specified report callback URL, if specified.
     *
     * This is a premium service. A billable event will be created upon the successful generation of the
     * Statement Report.
     *
     * After making this call, the client app may wait for a notification to be sent to the Report Listener
     * Service, or it may enter a loop, which should wait 20 seconds and then call the service Get Report
     * to see if the report is finished. While the report is being generated, Get Report will return a
     * minimal report including status inProgress. The loop should repeat every 20 seconds until Get Report
     * returns a different status.
     *
     * A Report Consumer must be created for the given Customer (using Create Report Consumer) before
     * calling this service. If no Report Consumer has been created, the service will return HTTP 400 (Bad
     * Request).
     *
     * @param string                                    $accept      Replace 'json' with 'xml' if preferred
     * @param integer                                   $customerId  ID of the customer
     * @param Models\GenerateStatementReportConstraints $body        TODO: type description here
     * @param string                                    $callbackUrl (optional) The Report Listener URL to receive
     *                                                               notifications (optional, must be URL-encoded)
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateStatementReport(
        $accept,
        $customerId,
        $body,
        $callbackUrl = null
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/statement';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'  => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl' => $callbackUrl,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateStatementReportResponse');
    }
}
