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
class ConsumerController extends BaseController
{
    /**
     * @var ConsumerController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return ConsumerController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get the details of a consumer record.
     *
     * If the service is successful, HTTP 200 (Accepted) will be returned. If the customer does not exist,
     * the service will return HTTP 404 (Not Found)
     *
     * @param integer $customerId   Finicity’s ID of the customer
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getConsumerForCustomer(
        $customerId,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/consumer';

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
        if ($response->code == 404) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\Consumer');
    }

    /**
     * Create a consumer record associated with the given customer. A consumer persists as the owner of any
     * reports that are generated, even after the original customer is deleted from the system. A consumer
     * must be created for the given customer before calling any of the Generate Report services.
     *
     * If a consumer already exists for this customer, this service will return HTTP 409 (Conflict). If the
     * consumer is successfully created, the service will return HTTP 201 (Created).
     *
     * @param integer                      $customerId   Finicity’s ID for the customer
     * @param Models\CreateConsumerRequest $body         TODO: type description here
     * @param string                       $accept       Replace 'json' with 'xml' if preferred
     * @param string                       $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createConsumer(
        $customerId,
        $body,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $body, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/customers/{customerId}/consumer';

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
        if ($response->code == 404) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CreateConsumerResponse');
    }

    /**
     * Get the details of a consumer record. If the service successfully retrieves the consumer record,
     * HTTP 200 will be returned. If the consumer does not exist, the service will return HTTP 404.
     *
     * @param string $consumerId   Finicity’s ID of the consumer (UUID with max length 32 characters)
     * @param string $accept       Replace 'json' with 'xml' if preferred
     * @param string $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getConsumer(
        $consumerId,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($consumerId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/consumers/{consumerId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'consumerId'   => $consumerId,
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
        if ($response->code == 404) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\Consumer');
    }

    /**
     * Modify the details for an existing consumer. All fields are required for a consumer record, but
     * individual fields for this call are optional because fields that are not specified will be left
     * unchanged.
     *
     * If the service is successful, HTTP 204 (No Content) will be returned. If the consumer does not exist,
     * the service will return HTTP 404.
     *
     * @param string                       $consumerId   Finicity ID of the consumer (UUID with max length 32
     *                                                   characters)
     * @param Models\CreateConsumerRequest $body         Consumer details
     * @param string                       $accept       Replace 'json' with 'xml' if preferred
     * @param string                       $contentType  Replace 'json' with 'xml' if preferred
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function modifyConsumer(
        $consumerId,
        $body,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($consumerId, $body, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/decisioning/v1/consumers/{consumerId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'consumerId'   => $consumerId,
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
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }
}
