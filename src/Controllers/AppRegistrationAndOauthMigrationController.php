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
class AppRegistrationAndOauthMigrationController extends BaseController
{
    /**
     * @var AppRegistrationAndOauthMigrationController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return AppRegistrationAndOauthMigrationController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * If you have multiple applications for a single client, and you want to register their applications
     * to access financial institutions using OAuth connections, then use this API to assign all
     * applications to an existing customer.
     *
     * @param integer $customerId    The customer's ID for the customer you want to assign the app for.
     * @param integer $applicationId Application ID you want to assign the customer to. This is the "applicationId"
     *                               value returned from the Get App Registration Status endpoint
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function setCustomerApplicationID(
        $customerId,
        $applicationId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $applicationId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/applications/{applicationId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'    => $customerId,
            'applicationId' => $applicationId,
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
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers);

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
     * Register new applications to access financial institutions using OAuth connections.
     *
     * @param Models\AppRegistrationRequest $body The values for the new app registration
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function appRegistration(
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/partners/applications';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8',
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AppRegistrationResponse');
    }

    /**
     * Update the field values you want to change for the registered applications accessing financial
     * institutions using OAuth connections.
     *
     * @param integer                             $preAppId The preAppId from the App Registration and Get App
     *                                                      Registration Status endpoints
     * @param Models\ModifyAppRegistrationRequest $body     The values for the app registration modification
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function modifyAppRegistration(
        $preAppId,
        $body
    ) {
        //check that all required arguments are provided
        if (!isset($preAppId, $body)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/aggregation/v1/partners/applications/{preAppId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'preAppId' => $preAppId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8',
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken
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

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AppRegistrationResponse');
    }

    /**
     * The institutionLoginId parameter uses Finicity’s internal FI mapping to move accounts from the
     * current FI legacy connection to the new OAuth FI connection.
     *
     * The API returns a list of accounts for the institution login id specified with an HTTP status code
     * 200.
     *
     * @param integer $customerId         The target customer for the account migration
     * @param integer $institutionLoginId The institutionLoginId for the set of accounts to be migrated from the legacy
     *                                    FI ID to the new OAuth FI ID
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function migrateInstitutionLoginAccountsV2(
        $customerId,
        $institutionLoginId
    ) {
        //check that all required arguments are provided
        if (!isset($customerId, $institutionLoginId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v2/customers/{customerId}/institutionLogins/{institutionLoginId}/migration';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId'         => $customerId,
            'institutionLoginId' => $institutionLoginId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Accept'           => 'application/json',
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\CustomerAccounts');
    }

    /**
     * Get the status of your application registration to access financial institutions using OAuth
     * connections.
     *
     * @param string  $accept        (optional) application/json, application/xml
     * @param integer $preAppId      (optional) Look up the status of an app by the preAppId
     * @param string  $applicationId (optional) Look up the status of an app by the applicationId
     * @param string  $status        (optional) Look up the status of app registration requests by the registration
     *                               request status. Valid values P (For Pending), A (For Approved), R (For Rejected)
     * @param string  $appName       (optional) Look up app registration requests by the application name
     * @param integer $submittedDate (optional) Look up app registration requests by the date they were submitted in
     *                               epoch format.
     * @param integer $modifiedDate  (optional) Look up app registration requests by the date the request was updated.
     *                               This could be used to determine when the app was updated to approved or rejected.
     * @param integer $page          (optional) Select which page of results to return
     * @param integer $pageSize      (optional) Select how many results per page to return
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAppRegistrationStatusV2(
        $accept = 'application/json',
        $preAppId = null,
        $applicationId = null,
        $status = null,
        $appName = null,
        $submittedDate = null,
        $modifiedDate = null,
        $page = 1,
        $pageSize = 1
    ) {

        //prepare query string for API call
        $_queryBuilder = '/aggregation/v2/partners/applications';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'preAppId'      => $preAppId,
            'applicationId' => $applicationId,
            'status'        => $status,
            'appName'       => $appName,
            'submittedDate' => $submittedDate,
            'modifiedDate'  => $modifiedDate,
            'page'          => (null != $page) ? $page : 1,
            'pageSize'      => (null != $pageSize) ? $pageSize : 1,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Finicity-App-Key' => Configuration::$finicityAppKey,
            'Finicity-App-Token' => Configuration::$finicityAppToken,
            'Accept'          => (null != $accept) ? $accept : 'application/json'
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

        return $mapper->mapClass($response->body, 'FinicityAPILib\\Models\\AppStatuses');
    }
}
