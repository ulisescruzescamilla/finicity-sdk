<?php

namespace FinicityAPILib\Controllers;

use FinicityAPILib\Http\HttpCallBack;
use FinicityAPILib\Http\HttpContext;
use FinicityAPILib\Http\HttpResponse;
use FinicityAPILib\APIException;
use FinicityAPILib\Exceptions;
use \apimatic\jsonmapper\JsonMapper;
use Unirest\Request;

/**
* Base controller
*/
class BaseController
{
    /**
     * User-agent to be sent with API calls
     * @var string
     */
    const USER_AGENT = 'APIMATIC 2.0';

    /**
     * HttpCallBack instance associated with this controller
     * @var HttpCallBack
     */
    private $httpCallBack = null;

    /**
     * Set HttpCallBack for this controller
     * @param HttpCallBack $httpCallBack Http Callbacks called before/after each API call
     */
    public function setHttpCallBack(HttpCallBack $httpCallBack)
    {
        $this->httpCallBack = $httpCallBack;
    }

    /**
     * Get HttpCallBack for this controller
     * @return HttpCallBack The HttpCallBack object set for this controller
     */
    public function getHttpCallBack()
    {
        return $this->httpCallBack;
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper()
    {
        $mapper = new JsonMapper();
        $mapper->sAdditionalPropertiesCollectionMethod = 'addAdditionalProperty';
        return $mapper;
    }

    protected function validateResponse(HttpResponse $response, HttpContext $_httpContext)
    {
        if (($response->getStatusCode() < 200) || ($response->getStatusCode() > 208)) { //[200,208] = HTTP OK
            throw new APIException('HTTP Response Not OK', $_httpContext);
        }
    }
}
