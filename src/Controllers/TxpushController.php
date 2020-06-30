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
class TxpushController extends BaseController
{
    /**
     * @var TxpushController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return TxpushController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Inject a transaction into the transaction list for a testing account. This allows an app to trigger
     * TxPush notifications for the account in order to test the app’s TxPush Listener service. This causes
     * the platform to send one transaction event and one account event (showing that the account balance
     * has changed). This service is only supported for testing accounts (accounts on institution 101732).
     *
     * @param string                                    $contentType  application/json, application/xml
     * @param string                                    $accept       application/json, application/xml
     * @param integer                                   $customerId   The ID of the customer who owns the account
     * @param integer                                   $accountId    The Finicity ID of the account whose events will
     *                                                                be sent to the TxPUSH Listener
     * @param Models\CreateTxpushTestTransactionRequest $body         TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function create_txpush_TestTransaction(
        $contentType,
        $accept,
        $customerId,
        $accountId,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($contentType, $accept, $customerId, $accountId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/transactions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'accountId'    => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Content-Type'    => $contentType,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CreateTxpushTestTransactionResponse');
    }

    /**
     * Register a client app’s TxPUSH Listener to receive TxPUSH notifications related to the given account.
     *
     * Each call to this service will return two records, one with class account and one with class
     * transaction. Account events are sent when values change in the account’s fields (such as balance or
     * interestRate). Transaction events are sent whenever a new transaction is posted for the account. For
     * institutions that do not provide TxPUSH services, notifications are sent as soon as Finicity finds a
     * new transaction or new account data through regular aggregation processes.
     *
     * The listener’s URL must be secure (https) for any real-world account. In addition, the
     * client’sTxPUSH Listener will need to be verified. HTTP and HTTPS connections are only allowed on the
     * standard ports 80 (HTTP) and 443 (HTTPS). The use of other ports will result with the call failing.
     * For additional details on this process please see, TxPUSH Listener Service.
     *
     * @param string                           $contentType  application/json, application/xml
     * @param string                           $accept       application/json, application/xml
     * @param integer                          $customerId   The Finicity ID of the customer who owns the account
     * @param integer                          $accountId    The Finicity ID of the account whose events will be sent
     *                                                       to the TxPUSH Listener
     * @param Models\TxpushSubscriptionRequest $body         TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function subscribeTo_txpush_Notifications(
        $contentType,
        $accept,
        $customerId,
        $accountId,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($contentType, $accept, $customerId, $accountId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/txpush';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'accountId'    => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Content-Type'    => $contentType,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\TxpushSubscriptions');
    }

    /**
     * Delete all TxPush subscriptions with their notifications for the indicated account. No more
     * notifications will be sent for account or transaction events.
     *
     * @param integer $customerId The ID of the customer who owns the account
     * @param integer $accountId  The Finicity ID of the account whose events will be sent to the TxPUSH Listener
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function disable_txpush_Notifications(
        $customerId,
        $accountId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/txpush';

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
     * Delete a specific subscription to TxPush notifications for the indicated account. This could be
     * individual deleting the account or transactions events. No more events will be sent for that
     * specific subscription.
     *
     * @param integer $customerId     The ID of the customer who owns the account
     * @param integer $subscriptionId The ID of the specific subscription to be deleted, returned from Enable TxPUSH
     *                                Notifications
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function delete_txpush_Subscription(
        $customerId,
        $subscriptionId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $subscriptionId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/subscriptions/{subscriptionId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'     => $customerId,
            'subscriptionId' => $subscriptionId,
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
}
