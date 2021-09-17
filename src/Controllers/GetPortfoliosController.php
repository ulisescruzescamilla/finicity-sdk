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
class GetPortfoliosController extends BaseController
{
    /**
     * @var GetPortfoliosController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return GetPortfoliosController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Returns a portfolio of most recently generated report for each report type for a specified customer.
     * If there are multiple reports that were generated for a report type (VOA, VOI, etc), only the most
     * recently generated report for the type will be returned.
     *
     * HTTP 404 status means that there is no data for the customer or portfolio. HTTP 200 (OK) status
     * means that the call was successful.
     *
     *
     * @param integer $customerId   Finicity ID of the customer
     * @param string  $portfolioId  Finicity portfolio ID (Max 17 characters) with the portfolio version number. Using
     *                              the portfolio number without a version number will return the most recently
     *                              generated reports for the consumer.
     * @param string  $accept       Replace 'json' with 'xml' if preferred
     * @param string  $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPortfolioByCustomer(
        $customerId,
        $portfolioId,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $portfolioId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/decisioning/v1/customers/{customerId}/portfolios/{portfolioId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'   => $customerId,
            'portfolioId'  => $portfolioId,
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
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\PortfolioSummaryByCustomer');
    }

    /**
     * Returns a portfolio of most recently generated report for each report type for a specified consumer.
     * If there are multiple reports that were generated for a report type (VOA, VOI, etc), only the most
     * recently generated report for the type will be returned.
     *
     * HTTP 404 status means that there is no data for the consumer or portfolio. HTTP 200 (OK) status
     * means that the call was successful.
     *
     * @param string $consumerId   Finicity report consumer ID (max length 32 characters)
     * @param string $portfolioId  Finicity portfolio ID (Max 17 characters) with the portfolio version number. Using
     *                             the portfolio number without a version number will return the most recently
     *                             generated reports for the consumer.
     * @param string $accept       Replace 'json' with 'xml' if preferred
     * @param string $contentType  Replace 'json' with 'xml' if preferred
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPortfolioByConsumer(
        $consumerId,
        $portfolioId,
        $accept,
        $contentType
    ) {
        //check that all required arguments are provided
        if (!isset($consumerId, $portfolioId, $accept, $contentType)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/decisioning/v1/consumers/{consumerId}/portfolios/{portfolioId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'consumerId'   => $consumerId,
            'portfolioId'  => $portfolioId,
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
        if ($response->code == 400) {
            throw new Exceptions\Error1ErrorException('Bad Request', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\PortfolioSummary');
    }
}
