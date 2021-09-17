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
class InstitutionsController extends BaseController
{
    /**
     * @var InstitutionsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return InstitutionsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get Certified Institution List w/RSSD
     *
     * @param string  $accept application/json, application/xml
     * @param string  $search Search term, * returns all institutions
     * @param integer $start  Page (Default: 1)
     * @param integer $limit  Limits the number of results returned (max: 1000)
     * @param string  $type   product types trans_agg, voa, voi, state_agg, ach, aha
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCertifiedInstitutionsWithRSSD(
        $accept,
        $search,
        $start,
        $limit,
        $type
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $search, $start, $limit, $type)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/institution/v2/certifiedInstitutions/rssd';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'search' => $search,
            'start'  => $start,
            'limit'  => $limit,
            'type'   => $type,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetCertifiedInstitutionsResponse');
    }

    /**
     * Search for all the connected financial institutions (FI) that we support. This returns all the FIs
     * that match the search text for the financial institution’s *name* field.
     * To get a list of all FIs, leave the *search* parameter out of the body of the API call. If the
     * *search* parameter is in the body of the call but has no value, then the call returns an error.
     * If the value for *moreAvailable* in the response is true, you can retrieve the next page of results
     * by increasing the value of the *start* parameter in your next request:
     *
     * 1st Request
     * …start=1&limit=25 (first 25 from list 1-25)
     *
     * 2nd Request
     * …start=2&limit=25 (next 25 from list 26-51)
     *
     * @param string  $accept application/json, application/xml
     * @param string  $search (optional) Match the text for the query. URL-encoded required. See Handling Spaces in
     *                        Queries. <br> <br> **Note**: To get a list of all FIs, leave the *search* parameter out
     *                        of the body of the API call. <br>  <br> If the *search* parameter is in the body of the
     *                        call but has no value, then the call returns an error.
     * @param integer $start  (optional) The starting page number of records returned. The default is 1. <br>
     *                        <br>**Example**: If the limit for each call is 25, then start=1 returns 1-25 records. If
     *                        start=2 then records 26-51 are returned.
     * @param integer $limit  (optional) The maximum number of records per page returned for the search request. The
     *                        default is 25 records per page.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getInstitutions(
        $accept,
        $search = null,
        $start = 1,
        $limit = 25
    ) {
        //check that all required arguments are provided
        if (!isset($accept)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/institution/v2/institutions';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'search' => $search,
            'start'  => (null != $start) ? $start : 1,
            'limit'  => (null != $limit) ? $limit : 25,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetInstitutionsResponse');
    }

    /**
     * Search for institutions by certified product
     *
     * @param string  $accept application/json, application/xml
     * @param string  $search Text to match, or * to return all supported institutions.
     * @param integer $start  (optional) Starting index for this page of results (ignored if returning all
     *                        institutions). This will default to 1.
     * @param integer $limit  (optional) Maximum number of entries for this page of results (ignored if returning all
     *                        institutions). This will default to 25. Limits the number of results returned to 1000.
     * @param string  $type   (optional) Allowed types: voa, voi, state_agg, ach, aha
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCertifiedInstitutions(
        $accept,
        $search,
        $start = 1,
        $limit = 25,
        $type = null
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $search)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/institution/v2/certifiedInstitutions';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'search' => $search,
            'start'  => (null != $start) ? $start : 1,
            'limit'  => (null != $limit) ? $limit : 25,
            'type'   => $type,
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\GetCertifiedInstitutionsResponse');
    }

    /**
     * Get details for the specified institution
     *
     * @param string  $accept        application/json, application/xml
     * @param integer $institutionId Finicity’s ID of the institution to retrieve
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getInstitution(
        $accept,
        $institutionId
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $institutionId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/institution/v2/institutions/{institutionId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\Institution');
    }

    /**
     * This endpoint returns the branding information for an Institution given the `id`
     *
     * @param string  $accept Replace 'json' with 'xml' if preferred
     * @param integer $id     ID of the institution
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getInstitutionBranding(
        $accept,
        $id
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $id)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/institution/v2/institutions/{id}/branding';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'id'     => $id,
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

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('The requested entity was not found', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\InstitutionBrandingResponse');
    }
}
