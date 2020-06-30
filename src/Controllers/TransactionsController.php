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
     * Get details for the specified transaction.
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
     * Get all transactions available for this customer within the given date range, across all accounts.
     * This service supports paging and sorting by transactionDate (or postedDate if no transaction date is
     * provided), with a maximum of 1000 transactions per request.
     *
     * Standard consumer aggregation provides up to 180 days of transactions prior to the date each account
     * was added to the Finicity system. To access older transactions, you must first call the service Load
     * Historic Transactions for Account.
     *
     * There is no limit for the size of the window between fromDate and toDate; however, the maximum
     * number of transactions returned in one page is 1000.
     *
     * If the value of moreAvailable in the response is true, you can retrieve the next page of results by
     * increasing the value of the start parameter in your next request:
     *
     * …&start=6&limit=5
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
    public function getCustomerTransactions(
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
     * Get all transactions available for this customer account within the given date range. This service
     * supports paging and sorting by transactionDate (or postedDate if no transaction date is provided),
     * with a maximum of 1000 transactions per request.
     *
     * Standard consumer aggregation provides up to 180 days of transactions prior to the date each account
     * was added to the Finicity system. To access older transactions, you must first call the Cash Flow
     * Verification service Load Historic Transactions for Account.
     *
     * There is no limit for the size of the window between fromDate and toDate; however, the maximum
     * number of transactions returned in one page is 1000.
     *
     * If the value of moreAvailable in the response is true, you can retrieve the next page of results by
     * increasing the value of the start parameter in your next request:
     *
     * …&start=6&limit=5
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
}
