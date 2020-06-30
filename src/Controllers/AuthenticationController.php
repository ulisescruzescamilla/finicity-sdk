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
class AuthenticationController extends BaseController
{
    /**
     * @var AuthenticationController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return AuthenticationController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Change the partner secret that is used to authenticate this partner. The secret does not expire, but
     * can be changed by calling Modify Partner Secret. A valid partner secret may contain upper- and
     * lowercase characters, numbers, and the characters !, @, #, $, %, &, *, _, -, +. It must include at
     * least one number and at least one letter, and its length should be between 12 and 255 characters.
     *
     * @param string                          $contentType  application/json
     * @param Models\ModifyPartnerCredentials $body         Partner ID and Partner Secret From Developer Portal Along
     *                                                      With A Value For The New Partner Secret
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function modifyPartnerSecret(
        $contentType,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($contentType, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v2/partners/authentication';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
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
     * Validate the partner’s credentials (Finicity-App-Key, Partner ID, and Partner Secret) and return a
     * temporary access token. The token must be passed in the HTTP header Finicity-App-Token on all
     * subsequent API requests.
     *
     * The token is valid for two hours. You can have multiple active tokens at the same time.
     *
     * Five unsuccessful authentication attempts will cause the partner’s account to be locked. To unlock
     * the account, send an email to support@finicity.com
     *
     * @param string                    $contentType  application/json
     * @param string                    $accept       application/json
     * @param Models\PartnerCredentials $body         Partner ID and Partner Secret From Developer Portal
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function partnerAuthentication(
        $contentType,
        $accept,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($contentType, $accept, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v2/partners/authentication';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AuthenticationResponse');
    }
}
