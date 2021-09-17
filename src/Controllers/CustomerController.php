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
class CustomerController extends BaseController
{
    /**
     * @var CustomerController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return CustomerController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Find all customers enrolled by the current partner, where the search text is found in the customer’s
     * username or any combination of firstName and lastName fields. If no search text is provided, return
     * all customers.
     *
     * Valid values for type are testing, active.
     *
     * If the value of moreAvailable in the response is true, you can retrieve the next page of results by
     * increasing the value of the start parameter in your next request:
     *
     * …&start=6&limit=5
     *
     * @param string  $accept   application/json, application/xml
     * @param string  $search   (optional) The text you wish to match. Leave this empty if you wish to return all
     *                          customers. Must be URL-encoded (see Handling Spaces in Queries)
     * @param string  $username (optional) Username for exact match. (Will return 0 or 1 records.)
     * @param integer $start    (optional) Starting index for this page of results. The default value is 1.
     * @param integer $limit    (optional) Maximum number of entries for this page of results. The default value is 25.
     * @param string  $type     (optional) One of the values testing or active to return only customers of that type,
     *                          or leave empty to return all customers.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomers(
        $accept,
        $search = null,
        $username = null,
        $start = 1,
        $limit = 25,
        $type = null
    ) {
        //check that all required arguments are provided
        if (!isset($accept)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'search'   => $search,
            'username' => $username,
            'start'    => (null != $start) ? $start : 1,
            'limit'    => (null != $limit) ? $limit : 25,
            'type'     => $type,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetCustomersResponse');
    }

    /**
     * Modify the details for an enrolled customer. You must specify either the first name, the last name,
     * or both in the request.
     *
     * If the service is successful, HTTP 204 (No Content) will be returned.
     *
     * @param string                       $contentType  application/json, application/xml
     * @param integer                      $customerId   Finicity ‘s ID of the customer to modify
     * @param Models\ModifyCustomerRequest $body         The information to be modified for the customer
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function modifyCustomer(
        $contentType,
        $customerId,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($contentType, $customerId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}';

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * Get the details for the specified customer. The service will return HTTP 200 upon a successful call.
     * If the customer does not exist, the service will return HTTP 404.
     *
     * @param string  $contentLength  Must be 0 (this request has no body)
     * @param string  $accept         application/json, application/xml
     * @param integer $customerId     Finicity’s ID of the customer
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomer(
        $contentLength,
        $accept,
        $customerId
    ) {
        //check that all required arguments are provided
        if (!isset($contentLength, $accept, $customerId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\Customer');
    }

    /**
     * Completely remove a customer from the system. This will remove the customer and all associated
     * accounts and transactions.
     *
     * (Note that the request and response is the same for JSON or XML clients.)
     *
     * Use this service carefully! It will not pause for confirmation before performing the operation!
     *
     * Success: HTTP 204 (No Content)
     *
     * @param integer $customerId Finicity’s ID of the customer to delete
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteCustomer(
        $customerId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
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
     * This is a version 2 service that replaces version 1. The new version supports passing an
     * applicationId for assigning applicationId's to customers if a partner has more than one registered
     * app.
     *
     * Enroll an active customer, which is the actual owner of one or more real-world accounts. This is a
     * billable customer.
     *
     * This service is not available from the Test Drive. Calls to this service before enrolling in a paid
     * plan will return HTTP 429 (Too Many Requests).
     *
     * @param string                    $accept       application/json, application/xml
     * @param string                    $contentType  application/json, application/xml
     * @param Models\AddCustomerRequest $body         The Fields For The New Customer
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function addCustomer(
        $accept,
        $contentType,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $contentType, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v2/customers/active';

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AddCustomerResponse');
    }

    /**
     * This is a version 2 service that replaces version 1. The new version supports passing an
     * applicationId for assigning applicationId's to customers if a partner has more than one registered
     * app.
     *
     * Enroll a testing customer that is available for Test Drive accounts.
     *
     * For using testing customers when testing Finbank OAuth register a test application with your systems
     * engineer or account manager. You would then use that testing applicationId for the creating of any
     * testing customers. Testing customers can only be assigned to testing OAuth applications and Testing
     * customers can only add accounts to Finbank OAuth for testing OAuth implementation as well as other
     * Finbank testing institutions.
     *
     * @param string                    $accept       application/json, application/xml
     * @param string                    $contentType  application/json, application/xml
     * @param Models\AddCustomerRequest $body         The Fields For The New Customer
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function addTestingCustomer(
        $accept,
        $contentType,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $contentType, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v2/customers/testing';

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AddCustomerResponse');
    }

    /**
     * Get the details for the specified customer with additional details that includes the OAuth
     * application info. The service will return HTTP 200 upon a successful call. If the customer does not
     * exist, the service will return HTTP 404.
     *
     * @param string  $accept     application/json, application/xml
     * @param integer $customerId Finicity’s ID of the customer
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerWithApplicationData(
        $accept,
        $customerId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}/application';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerWithApplicationData');
    }
}
