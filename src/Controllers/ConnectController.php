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
     * Generates a Connect 2.0 URL link to add within your own applications. Use the `experience` parameter
     * to call Connect (per session) in the body of the request. Configure the `experience` parameter to
     * change the brand color, logo, icon, which credit decisioning report to generate when the Connect
     * application completes, and more.
     *
     * **Note**: Contact your Sales Account Team to set up the `experience` parameter.
     *
     * **MVS Developers** : You can pre-populate the consumer’s SSN (only the last 4 digits appear) and DOB
     * to display on the Find employment records page at the beginning of the MVS payroll app. Pass the SSN
     * and DOB values for the consumer in the body of the request call.
     *
     * @param string                             $accept application/json, application/xml
     * @param Models\GenerateV2ConnectURLRequest $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateV2ConnectURL(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/generate';

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
     * Connect Lite is a variation of Connect Full, which has a limited set of features.
     * • Sign in, user’s credentials, and Multi-Factor Authentication (MFA).
     * • No user account management.
     *
     * The Connect Web SDK isn’t a requirement when using Connect lite. However, if you want to use the SDK
     * events, routes, and user events, then you need to integrate with the Connect Web SDK.
     *
     * @param string                                 $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestLiteV2 $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateV2LiteConnectURL(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/generate/lite';

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
     * Use the connect fix endpoint when the following conditions occur:
     * * The connection to the user’s financial institution is lost.
     * * The user’s credentials were updated (for any number of reasons).
     * * The user’s MFA challenge has expired.
     *
     * @param string                                $accept application/json, application/xml
     * @param Models\GenerateConnectURLRequestFixV2 $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateV2FixConnectURL(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/generate/fix';

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
     * Send a Connect email to the consumer.
     * Use the `experience` parameter to call Connect (per session) in the body of the request. When the
     * consumer opens the email, they’ll click a button that opens the Connect application.
     *
     * Configure the `experience` parameter to change the brand color, logo, icon, which credit decisioning
     * report to generate when the Connect application completes, and more.
     *
     * **Note**: Contact your Sales Account Team to set up the `experience` parameter.
     *
     * **MVS Developers**: You can prepopulate the consumer’s SSN (only the last 4 digits appear) and DOB
     * to display on the Find employment records page at the beginning of the MVS payroll app. Pass the SSN
     * and DOB values for the consumer in the body of the request call.
     *
     * @param string                               $accept application/json
     * @param Models\GenerateV2ConnectEmailRequest $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function sendV2ConnectEmail(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/send/email';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateV2ConnectEmailResponse');
    }

    /**
     * Generates a Connect 2.0 URL link to add within your own applications. Use the `experience` parameter
     * to call Connect (per session) in the body of the request. Configure the `experience` parameter to
     * change the brand color, logo, icon, which credit decisioning report to generate when the Connect App
     * completes, and more.
     *
     * **Note**: Contact your Sales Account Team to set up the `experience` parameter.
     *
     * MVS prompts both the primary and joint borrower to enter each of their financial, payroll, and
     * paystub information in the same Connect session.
     *
     * You can prepopulate the consumer’s SSN (only the last 4 digits appear) and DOB to display on the
     * Find employment records page at the beginning of the MVS payroll app. Pass the SSN and DOB values
     * for the consumer in the body of the request call.
     *
     * @param string                                          $accept application/json, application/xml
     * @param Models\GenerateV2ConnectURLRequestJointBorrower $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function generateV2ConnectURLJointBorrower(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/generate/jointBorrower';

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
     * Send a Connect email to at least one of the joint borrower’s email addresses. When the consumer
     * opens the email, MVS prompts both the primary and joint borrower to enter each of their financial,
     * payroll, and paystub information in the same Connect session.
     *
     * Use the `experience` parameter to call Connect (per session) in the body of the request. Configure
     * the `experience` parameter to change the brand color, logo, icon, which credit decisioning report to
     * generate when the Connect application completes, and more.
     *
     * **Note**: Contact your Sales Account Team to set up the `experience` parameter.
     *
     * You can prepopulate the consumer’s SSN (only the last 4 digits appear) and DOB to display on the
     * Find employment records page at the beginning of the MVS payroll app. Pass the SSN and DOB values
     * for the consumer in the body of the request call.
     *
     * @param string                                    $accept application/json
     * @param Models\V2ConnectEmailRequestJointBorrower $body   Expected body to be sent with the request
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function sendV2ConnectEmailJointBorrower(
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/connect/v2/send/email/jointBorrower';

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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GenerateV2ConnectEmailResponse');
    }
}
