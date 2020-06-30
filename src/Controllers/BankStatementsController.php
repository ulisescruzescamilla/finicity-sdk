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
class BankStatementsController extends BaseController
{
    /**
     * @var BankStatementsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return BankStatementsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Connect to the account’s financial institution and download the most recent monthly statement for
     * the account, in PDF format. This is an interactive refresh, so MFA challenges may be required.
     *
     * The index parameter allows an app to request statements earlier than the most recent one. The
     * default is 1, meaning the most recent statement. Another value such as 3 would mean to count back
     * and retrieve the third most recent statement. For example, if a request is made in July, the most
     * recent statement (index 1) would probably be for June, and the third most recent statement (index 3)
     * would be for April.
     *
     * This is a premium service. The billing rate is the variable rate for Account Ownership Verification
     * under the current subscription plan. The billable event is a successful call to this service.
     *
     * HTTP status of 200 means the statement was retrieved successfully, and the body of the response
     * contains the bytes of the PDF document.
     *
     * HTTP status of 203 means the response contains an MFA challenge in XML or JSON format. Contact your
     * Account Manager or Systems Engineers to determine the best route to handle this HTTP status code.
     *
     * The recommended timeout setting for this request is 180 seconds in order to receive a response.
     * However you can terminate the connection after making the call the operation will still complete.
     * You will have to pull the account records to check for an updated aggregation attempt date to know
     * when the refresh is complete.
     *
     * Statements are only available for specific account types: checking, savings, money market, CDs, and
     * investments.
     *
     * Statements are not available for the following account types: mortgage, credit card, line of credit,
     * loan
     *
     * @param string  $accept     application/pdf, application/json (the document will be in PDF format, but errors
     *                            will be JSON)
     * @param integer $customerId Finicity ‘s ID for the customer who owns the account
     * @param integer $accountId  Finicity’s ID of the account
     * @param integer $index      (optional) Index of statement to retrieve (default is 1, maximum is 6)
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCustomerAccountStatement(
        $accept,
        $customerId,
        $accountId,
        $index = 1
    ) {
        //check that all required arguments are provided
        if (!isset($accept, $customerId, $accountId)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = 
            '/aggregation/v1/customers/{customerId}/accounts/{accountId}/statement';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'customerId' => $customerId,
            'accountId'  => $accountId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'index'      => (null != $index) ? $index : 1,
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

        return $response->body;
    }
}
