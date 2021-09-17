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
class TransactionsController extends BaseController
{
    /**
     * @var TransactionsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TransactionsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get all transactions available for this customer within the given date range, across all accounts.
     * This service supports paging and sorting by `transactionDate` (or `postedDate` if no transaction
     * date is provided), with a maximum of 1000 transactions per request.
     *
     * Standard consumer aggregation provides up to 180 days of transactions prior to the date each account
     * was added to the Finicity system. To access older transactions, you must first call the service Load
     * Historic Transactions for Account.
     *
     * There is no limit for the size of the window between fromDate and toDate; however, the maximum
     * number of transactions returned on one page is 1000.
     *
     * If the value of `moreAvailable` in the response is true, you can retrieve the next page of results
     * by increasing the value of the start parameter in your next request:
     *
     * …&start=6&limit=5
     *
     *
     * **Important**: This information applies to student loans (account type 402) for the following FIs.
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * **Grouped transactions**: When more than one loan is in a loan group, the FI group’s the
     * transactions
     * which display as a single transaction for each loan within the group.
     *
     * To identify the transactions for each loan in the loan group, pass the `accountNumberDisplay` field
     * found in
     * the following APIs to request the loan group number.
     * * Get Customer Account
     * * Get Customer Accounts
     * * Get Customer Accounts by Institution
     * * Get Customer Accounts by Institution Login
     *
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * **Changing transaction data**: Transactions outside of the 15-day lookback period may have changing
     * data due to the nature of student loan repayment.
     *
     * Example: Payment date of 6/16/21 changes to 5/4/19
     *
     * **Sync data with FI**: At the EOY 2020, the CARES Act made additional changes to some transactions
     * for these FIs outside of normal transaction changes. A backdate aggregation will resync the FI data.
     *
     * @param string  $accept         application/json, application/xml
     * @param integer $customerId     The ID of the customer whose transactions are to be retrieved
     * @param integer $fromDate       Starting timestamp for the date range (required) (see Handling Dates and Times)
     * @param integer $toDate         Ending timestamp for the date range (required, must be greater than fromDate)
     *                                (see Handling Dates and Times)
     * @param integer $start          (optional) Starting index for this page of results
     * @param integer $limit          (optional) Maximum number of entries for this page of results (max is 1000)
     * @param string  $sort           (optional) Sort order: asc for ascending order (oldest transactions are on page
     *                                1), descfor descending order (newest transactions are on page 1).
     * @param bool    $includePending (optional) true to include pending transactions if available.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerTransactionsAll(
        $accept,
        $customerId,
        $fromDate,
        $toDate,
        $start = 1,
        $limit = 1000,
        $sort = 'desc',
        $includePending = false
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $fromDate, $toDate)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v3/customers/{customerId}/transactions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'fromDate'       => $fromDate,
            'toDate'         => $toDate,
            'start'          => (null != $start) ? $start : 1,
            'limit'          => (null != $limit) ? $limit : 1000,
            'sort'           => (null != $sort) ? $sort : 'desc',
            'includePending' => (null != $includePending) ? var_export($includePending, true) : false,
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

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetTransactionsResponse');
    }

    /**
     * Get details for the specified transaction.
     *
     * **Important**: This information applies to student loans (account type 402) for the following FIs.
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * **Grouped transactions**: When more than one loan is in a loan group, the FI group’s the
     * transactions
     * which display as a single transaction for each loan within the group.
     *
     * To identify the transactions for each loan in the loan group, pass the `accountNumberDisplay` field
     * found in
     * the following APIs to request the loan group number.
     * * Get Customer Account
     * * Get Customer Accounts
     * * Get Customer Accounts by Institution
     * * Get Customer Accounts by Institution Login
     *
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * **Changing transaction data**: Transactions outside of the 15-day lookback period may have changing
     * data due to the nature of student loan repayment.
     *
     * Example: Payment date of 6/16/21 changes to 5/4/19
     *
     * **Sync data with FI**: At the EOY 2020, the CARES Act made additional changes to some transactions
     * for these FIs outside of normal transaction changes. A backdate aggregation will resync the FI data.
     *
     * @param string $accept        application/json, application/xml
     * @param string $customerId    Finicity ID for the customer whose transactions are to be retrieved
     * @param string $transactionId The transaction to be retrieved
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerTransaction(
        $accept,
        $customerId,
        $transactionId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $transactionId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v2/customers/{customerId}/transactions/{transactionId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'    => $customerId,
            'transactionId' => $transactionId,
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

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\Transaction');
    }

    /**
     * Get all transactions available for this customer account within the given date range. This service
     * supports paging and sorting by `transactionDate` (or `postedDate` if no transaction date is
     * provided), with a maximum of 1000 transactions per request.
     *
     * Standard consumer aggregation provides up to 180 days of transactions prior to the date each account
     * was added to the Finicity system. To access older transactions, you must first call the Cash Flow
     * Verification service Load Historic Transactions for Account.
     *
     * There is no limit for the size of the window between fromDate and toDate; however, the maximum
     * number of transactions returned on one page is 1000.
     *
     * If the value of `moreAvailable` in the response is true, you can retrieve the next page of results
     * by increasing the value of the start parameter in your next request:
     *
     * …&start=6&limit=5
     *
     *
     * **Important**: This information applies to student loans (account type 402) for the following FIs.
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * **Grouped transactions**: When more than one loan is in a loan group, the FI group’s the
     * transactions
     * which display as a single transaction for each loan within the group.
     *
     * To identify the transactions for each loan in the loan group, pass the `accountNumberDisplay` field
     * found in
     * the following APIs to request the loan group number.
     * * Get Customer Account
     * * Get Customer Accounts
     * * Get Customer Accounts by Institution
     * * Get Customer Accounts by Institution Login
     *
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * **Changing transaction data**: Transactions outside of the 15-day lookback period may have changing
     * data due to the nature of student loan repayment.
     *
     * Example: Payment date of 6/16/21 changes to 5/4/19
     *
     * **Sync data with FI**: At the EOY 2020, the CARES Act made additional changes to some transactions
     * for these FIs outside of normal transaction changes. A backdate aggregation will resync the FI data.
     *
     * @param string  $accept         application/json, application/xml
     * @param integer $customerId     The ID of the customer whose transactions are to be retrieved
     * @param string  $accountId      Finicity’s ID of the account whose transactions are to be retrieved
     * @param integer $fromDate       Starting timestamp for the date range (required) (see Handling Dates and Times)
     * @param integer $toDate         Ending timestamp for the date range (required, must be greater than fromDate)
     *                                (see Handling Dates and Times)
     * @param integer $start          (optional) Starting index for this page of results
     * @param integer $limit          (optional) Maximum number of entries for this page of results (max is 1000)
     * @param string  $sort           (optional) Sort order: asc for ascending order (oldest transactions are on page
     *                                1), descfor descending order (newest transactions are on page 1).
     * @param bool    $includePending (optional) true to include pending transactions if available.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccountTransactions(
        $accept,
        $customerId,
        $accountId,
        $fromDate,
        $toDate,
        $start = 1,
        $limit = 1000,
        $sort = 'desc',
        $includePending = false
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $accountId, $fromDate, $toDate)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v3/customers/{customerId}/accounts/{accountId}/transactions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            'accountId'      => $accountId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'fromDate'       => $fromDate,
            'toDate'         => $toDate,
            'start'          => (null != $start) ? $start : 1,
            'limit'          => (null != $limit) ? $limit : 1000,
            'sort'           => (null != $sort) ? $sort : 'desc',
            'includePending' => (null != $includePending) ? var_export($includePending, true) : false,
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

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetTransactionsResponse');
    }

    /**
     * Generate a Transaction Report for specified accounts under the given customer. This service
     * retrieves up to 24 months of transaction history for the given customer. It then uses this
     * information to generate the Transaction Report.
     *
     * The service returns immediately with status HTTP 202 (Accepted). When finished, a notification will
     * be sent to the specified report callback URL, if specified.
     *
     * This is a premium service. A billable event will be created upon the successful generation of the
     * Transactions Report.
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
     * There cannot be more than 24 months between fromDate and toDate.
     *
     * @param string                                       $accept         JSON or XML output.
     * @param string                                       $callbackUrl    The Report Listener URL to receive
     *                                                                     notifications (optional, must be URL-
     *                                                                     encoded)
     * @param integer                                      $customerId     ID of the customer
     * @param integer                                      $fromDate       The `fromDate` param is an Epoch Timestamp
     *                                                                     (in seconds).  It must be 10 digits long and
     *                                                                     within two years of the present day.
     *                                                                     Example: ?fromDate=1494449017.   If fromDate
     *                                                                     is not used or it’s longer than 10 digits,
     *                                                                     the transaction report history defaults to
     *                                                                     24 months of data.    (Optional)
     * @param integer                                      $toDate         The ending timestamp for the date range. The
     *                                                                     value must be greater than fromDate. See
     *                                                                     Handling Dates and Times.
     * @param bool                                         $includePending True: Include pending transactions in the
     *                                                                     report. False: Set by default.
     * @param Models\GenerateTransactionsReportConstraints $body           (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateTransactionsReport(
        $accept,
        $callbackUrl,
        $customerId,
        $fromDate,
        $toDate,
        $includePending,
        $body = null
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $callbackUrl, $customerId, $fromDate, $toDate, $includePending)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v2/customers/{customerId}/transactions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'callbackUrl'    => $callbackUrl,
            'fromDate'       => $fromDate,
            'toDate'         => $toDate,
            'includePending' => var_export($includePending, true),
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateTransactionsReportResponse');
    }
}
