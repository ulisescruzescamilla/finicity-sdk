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
class ConnectController extends BaseController
{
    /**
     * @var ConnectController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return ConnectController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * No matter how you plan on implementing Finicity Connect, you’ll need to generate and retrieve a
     * Finicity Connect Link.  You will need to specify what type of Finicity Connect you need depending on
     * what will happen once the customer accounts and transaction data are gathered.  Below you’ll find
     * how to generate the Connect link as well as where to specify what type of Finicity Connect you need.
     *
     * Once you have generated the link it will only last until the authentication token under which it was
     * generated expires.  After that you will need to regenerate the Connect link under a new
     * authentication token. We recommend generating a new authentication token when you generate a Connect
     * link, to guarantee a full two hour life-span.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call.  Many times the type also
     * corresponds to the report that will be run upon completing the Connect flow.
     *
     * It is best to use the documentation for the specific use case you are interested in as the
     * documentation here is a list of all the possible parameters you can send for this endpoint depending
     * on the use case. See the following more specific documentation for your use case.......
     * Generate Finicity Connect URL (Data and Payments)
     * Generate Finicity Connect URL (Lending)
     * Generate Finicity Connect URL (Lite)
     * Generate Finicity Connect URL (Fix)
     *
     * @param string                           $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequest $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateConnectURLAllTypes(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/generate';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectURLResponse');
    }

    /**
     * No matter how you plan on implementing Finicity Connect, you’ll need to generate and retrieve a
     * Finicity Connect Link.  You will need to specify what type of Finicity Connect you need depending on
     * what will happen once the customer accounts and transaction data are gathered.  Below you’ll find
     * how to generate the Connect link as well as where to specify what type of Finicity Connect you need.
     *
     * Once you have generated the link it will only last until the authentication token under which it was
     * generated expires.  After that you will need to regenerate the Connect link under a new
     * authentication token. We recommend generating a new authentication token when you generate a Connect
     * link, to guarantee a full two hour life-span.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call.
     *
     * See the specific documentation for the types to see more details on the flow. This documentation
     * gives the applicable implementation details for the following types......
     *
     * - ach
     * - aggregation
     *
     * @param string                                          $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestDataAndPayments $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateConnectURLDataAndPayments(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/generate';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectURLResponse');
    }

    /**
     * No matter how you plan on implementing Finicity Connect, you’ll need to generate and retrieve a
     * Finicity Connect Link.  You will need to specify what type of Finicity Connect you need depending on
     * what will happen once the customer accounts and transaction data are gathered.  Below you’ll find
     * how to generate the Connect link as well as where to specify what type of Finicity Connect you need.
     *
     * Once you have generated the link it will only last until the authentication token under which it was
     * generated expires.  After that you will need to regenerate the Connect link under a new
     * authentication token. We recommend generating a new authentication token when you generate a Connect
     * link, to guarantee a full two hour life-span.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call. For lending, each type signifies a
     * report that will be generated as part of the connect flow unless otherwise specified.
     *
     * See the specific documentation for the types to see more details on the flow. This documentation
     * gives the applicable implementation details for the following types......
     *
     * - voa
     * - voahistory
     * - voi
     * - voieTxVerify
     * - voieStatement
     * - payStatement
     * - assetSummary
     * - preQualVoa
     *
     * @param string                                  $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestLending $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateConnectURLLending(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/generate';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectURLResponse');
    }

    /**
     * No matter how you plan on implementing Finicity Connect, you’ll need to generate and retrieve a
     * Finicity Connect Link.  You will need to specify what type of Finicity Connect you need depending on
     * what will happen once the customer accounts and transaction data are gathered.  Below you’ll find
     * how to generate the Connect link as well as where to specify what type of Finicity Connect you need.
     *
     * Once you have generated the link it will only last until the authentication token under which it was
     * generated expires.  After that you will need to regenerate the Connect link under a new
     * authentication token. We recommend generating a new authentication token when you generate a Connect
     * link, to guarantee a full two hour life-span.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call.
     *
     * See the specific documentation for the types to see more details on the flow. This documentation
     * gives the applicable implementation details for the following types......
     *
     * - lite
     *
     * @param string                               $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestLite $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateConnectURLLite(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/generate';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectURLResponse');
    }

    /**
     * No matter how you plan on implementing Finicity Connect, you’ll need to generate and retrieve a
     * Finicity Connect Link.  You will need to specify what type of Finicity Connect you need depending on
     * what will happen once the customer accounts and transaction data are gathered.  Below you’ll find
     * how to generate the Connect link as well as where to specify what type of Finicity Connect you need.
     *
     * Once you have generated the link it will only last until the authentication token under which it was
     * generated expires.  After that you will need to regenerate the Connect link under a new
     * authentication token. We recommend generating a new authentication token when you generate a Connect
     * link, to guarantee a full two hour life-span.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call.
     *
     * See the specific documentation for the types to see more details on the flow. This documentation
     * gives the applicable implementation details for the following types......
     *
     * - fix
     *
     * @param string                              $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestFix $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateConnectURLFix(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/generate';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectURLResponse');
    }

    /**
     * A connect email sends an email to the customer which will contain a link to the connect flow. You
     * will need to specify what type of Finicity Connect you need depending on what will happen once the
     * customer accounts and transaction data are gathered.
     *
     * Several Finicity products utilize Finicity Connect, and most products have their own type of Connect.
     * The Connect type is controlled by the “type” code in the call.  Many times the type also
     * corresponds to the report that will be run upon completing the Connect flow.
     *
     * For Send Connect Email service it does not support the types aggregation, lite and fix.
     *
     * See the endpoint Generate Finicity Connect URL (Lending) for additional details on a non email
     * implementation.
     *
     * @param string                             $accept application/json, application/xml
     * @param Models\GenerateConnectEmailRequest $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function sendConnectEmail(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v1/send/email';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateConnectEmailResponse');
    }
}
