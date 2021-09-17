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
class PayStatementsController extends BaseController
{
    /**
     * @var PayStatementsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return PayStatementsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Services to store a pay statement for a customer. Within the body of the request, the base 64
     * encoded value of the pay statement must be passed with a label.
     *
     * @param string                          $finicityAppKey     Finicity-App-Key from Developer Portal
     * @param string                          $finicityAppToken   Token returned from Partner Authentication
     * @param integer                         $customerId         Finicity's ID of the customer
     * @param Models\StorePayStatementRequest $body               The base 64 encoded value of the pay statement and
     *                                                            pay statement label.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function storeCustomerPayStatement(
        $finicityAppKey,
        $finicityAppToken,
        $customerId,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($finicityAppKey, $finicityAppToken, $customerId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/customers/{customerId}/payStatements';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'         => $customerId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Accept'           => 'application/json',
            'content-type'     => 'application/json; charset=utf-8',
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Finicity-App-Key'   => $finicityAppKey,
            'Finicity-App-Token' => $finicityAppToken
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\StorePayStatementResponse');
    }
}
