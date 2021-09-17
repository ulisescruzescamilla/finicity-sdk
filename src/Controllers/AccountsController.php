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
class AccountsController extends BaseController
{
    /**
     * @var AccountsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return AccountsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get details for all accounts associated with the given institution login. All accounts returned are
     * accessible by a single set of credentials on a single institution.
     *
     *
     * **Important**: This information applies to Student loans (account type 402) for only the following
     * FIs:
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * The FIs utilize Loan Groups to group one or more loans together in a student loan account.
     *
     * The Loan Group number is passed in the `accountNumberDisplay` field.
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * @param string  $accept             application/json, application/xml
     * @param integer $customerId         Finicity ID for the customer whose accounts are to be retrieved
     * @param integer $institutionLoginId The institution login ID (from the account record)
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccountsByInstitutionLogin(
        $accept,
        $customerId,
        $institutionLoginId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $institutionLoginId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/institutionLogins/{institutionLoginId}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'         => $customerId,
            'institutionLoginId' => $institutionLoginId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'             => $accept
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }

    /**
     * Remove the specified set of accounts by institution login id from the Finicity system.
     *
     * (Note that the request and response are the same for JSON and XML clients.)
     *
     * @param integer $customerId         The ID of the customer whose accounts are to be deleted
     * @param integer $institutionLoginId The Finicity ID of the Institution Login for the set of accounts to be
     *                                    deleted
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteCustomerAccountsByInstitutionLogin(
        $customerId,
        $institutionLoginId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $institutionLoginId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/institutionLogins/{institutionLoginId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'         => $customerId,
            'institutionLoginId' => $institutionLoginId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * Get details for the specified account.
     *
     * **Important**: This information applies to Student loans (account type 402) for only the following
     * FIs:
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * The FIs utilize Loan Groups to group one or more loans together in a student loan account.
     *
     * The Loan Group number is passed in the `accountNumberDisplay` field.
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * @param string  $accept     application/json, application/xml
     * @param integer $customerId The ID of the customer who owns the account
     * @param integer $accountId  Finicity’s ID of the account to be retrieved
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccount(
        $accept,
        $customerId,
        $accountId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
            'accountId'  => $accountId,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccount');
    }

    /**
     * Get details for all accounts owned by the specified customer.
     *
     * **Important**: This information applies to Student loans (account type 402) for only the following
     * FIs:
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * The FIs utilize Loan Groups to group one or more loans together in a student loan account.
     *
     * The Loan Group number is passed in the `accountNumberDisplay` field.
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * @param string  $accept     application/json, application/xml
     * @param integer $customerId The ID of the customer whose accounts are to be retrieved
     * @param string  $status     (optional) append, ?status=pending, to return accounts in active and pending status.
     *                            Pending accounts were discovered but not activated and will not have transactions or
     *                            have balance updates
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccounts(
        $accept,
        $customerId,
        $status = null
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'status'     => $status,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }

    /**
     * Refresh account and transaction data for all accounts associated with a given institutionLoginId
     * with a connection to the institution.
     *
     * Client apps are not permitted to automate calls to the Refresh services. Active accounts are
     * automatically refreshed by Finicity once per day. Because many financial institutions only post
     * transactions once per day, calling Refresh repeatedly is usually a waste of resources and is not
     * recommended.
     *
     * Apps may call Refresh services for a specific customer when there is a specific business case for
     * the need of data that is up to date as of the moment. Please discuss with your account manager and
     * systems engineer for further clarification.
     *
     * The recommended timeout setting for this request is 120 seconds in order to receive a response.
     * However you can terminate the connection after making the call the operation will still complete.
     * You will have to pull the account records to check for an updated aggregation attempt date to know
     * when the refresh is complete.
     *
     * @param integer $contentLength      Must be 0 (this request has no body)
     * @param string  $accept             application/json, application/xml
     * @param string  $customerId         The ID of the customer who owns the accounts
     * @param string  $institutionLoginId The institution login ID from the account records
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function refreshCustomerAccountsByInstitutionLogin(
        $contentLength,
        $accept,
        $customerId,
        $institutionLoginId
    ) {
        //check that all required arguments are provided
        if (!isset($contentLength, $accept, $customerId, $institutionLoginId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/institutionLogins/{institutionLoginId}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'         => $customerId,
            'institutionLoginId' => $institutionLoginId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Content-Length'     => $contentLength,
            'Accept'             => $accept,
            'interactive'        => false
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }

    /**
     * Remove the specified account from Finicity Aggregation.
     *
     *
     *
     * @param integer $customerId The ID of the customer who owns the account
     * @param integer $accountId  Finicity’s ID of the account to be deleted
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteCustomerAccount(
        $customerId,
        $accountId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
            'accountId'  => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * Get details for all active accounts owned by the specified customer at the specified institution.
     *
     *
     * **Important**: This information applies to Student loans (account type 402) for only the following
     * FIs:
     * * Nelnet (101749)
     * * Edfinancial (13179)
     * * Granite State (14551)
     * * OSLA (100722)
     *
     * The FIs utilize Loan Groups to group one or more loans together in a student loan account.
     *
     * The Loan Group number is passed in the `accountNumberDisplay` field.
     * The response format is account number; group number; loan number.
     *
     * Example: xxxx1234-Group A-Loan 1 (Where A is the name of the loan group.)
     *
     * @param string  $accept        application/json, application/xml
     * @param integer $customerId    The ID of the customer who owns the account
     * @param integer $institutionId Finicity’s ID of the institution
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccountsByInstitution(
        $accept,
        $customerId,
        $institutionId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $institutionId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/institutions/{institutionId}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'    => $customerId,
            'institutionId' => $institutionId,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }

    /**
     * Connect to the account’s financial institution and load up to 24 months of historic transactions for
     * the account. Length of history varies by institution.
     *
     * This is a premium service. The billable event is a call to this service specifying a customerId that
     * has not been seen before by this service. (If this service is called multiple times with the same
     * customerId, to load transactions from multiple accounts, only one billable event has occurred.)
     *
     * HTTP status of 204 means historic transactions have been loaded successfully. The transactions are
     * now available by calling Get Customer Account Transactions.
     *
     * HTTP status of 203 means the response contains an MFA challenge. Contact your Account Manager or
     * Systems Engineers to determine the best route to handle this HTTP status code.
     *
     * The recommended timeout setting for this request is 180 seconds in order to receive a response.
     * However you can terminate the connection after making the call the operation will still complete.
     * You will have to pull the account records to check for an updated aggregation attempt date to know
     * when the refresh is complete.
     *
     * This service usually requires the HTTP header Content-Length: 0 because it is a POST request with no
     * request body.
     *
     * The date range sent to the institution is calculated from the account’s createdDate. This means that
     * calling this service a second time for the same account normally will not add any new transactions
     * for the account. For this reason, a second call to this service for a known accountId will usually
     * return immediately with HTTP 204.
     *
     * In a few specific scenarios, it may be desirable to force a second connection to the institution for
     * a known accountId. Some examples are:
     *
     * - The institution’s policy has changed, making more transactions available.
     * - Finicity has now added a longer transaction history support for the institution.
     * - The first call encountered an error, and the resulting Aggregation Ticket has now been fixed by
     * the Finicity Support Team.
     *
     * In these cases, the POST request can contain the parameter force=true in the request body to force
     * the second connection.
     *
     * @param integer $contentLength  Must be 0 (this request has no body)
     * @param string  $accept         application/json, application/xml
     * @param integer $customerId     The ID Of the customer who owns the account
     * @param integer $accountId      The Finicity ID of the account to pull transaction history for
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function loadHistoricTransactionsForCustomerAccount(
        $contentLength,
        $accept,
        $customerId,
        $accountId
    ) {
        //check that all required arguments are provided
        if (!isset($contentLength, $accept, $customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/transactions/historic';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            'accountId'      => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Content-Length'  => $contentLength,
            'Accept'          => $accept
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * Refresh account and transaction data for all accounts associated with a given customerId with a
     * connection to the institution.
     *
     * Client apps are not permitted to automate calls to the Refresh services. Active accounts are
     * automatically refreshed by Finicity once per day. Because many financial institutions only post
     * transactions once per day, calling Refresh repeatedly is usually a waste of resources and is not
     * recommended.
     *
     * Apps may call Refresh services for a specific customer when there is a specific business case for
     * the need of data that is up to date as of the moment. Please discuss with your account manager and
     * systems engineer for further clarification.
     *
     * The recommended timeout setting for this request is 120 seconds in order to receive a response.
     * However you can terminate the connection after making the call the operation will still complete.
     * You will have to pull the account records to check for an updated aggregation attempt date to know
     * when the refresh is complete.
     *
     * @param integer $contentLength  Must be 0 (this request has no body)
     * @param string  $accept         application/json, application/xml
     * @param string  $customerId     The ID of the customer who owns the accounts to be refreshed
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function refreshCustomerAccounts(
        $contentLength,
        $accept,
        $customerId
    ) {
        //check that all required arguments are provided
        if (!isset($contentLength, $accept, $customerId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}/accounts';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Content-Length'  => $contentLength,
            'Accept'          => $accept
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }
}
