<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateConnectURLRequestFixV2 implements JsonSerializable
{
    /**
     * The partner id you can obtain from your Finicity developer dashboard
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * Finicity’s customer ID. Obtained from the Add Customer call.
     * @required
     * @var string $customerId public property
     */
    public $customerId;

    /**
     * The institutionLoginId for the account record. Used in type “fix” in order to pull up a fix flow for
     * a specific set of accounts under one institutionLoginId. If none is given then the fix flow will
     * give an account management dashboard and attempt to have the customer fix all accounts in turn.
     * @required
     * @var integer $institutionLoginId public property
     */
    public $institutionLoginId;

    /**
     * The url that customers will be redirected to after completing Finicity Connect. <br> *Required
     * unless Connect is embedded inside your application. (iframe)*
     * @var string|null $redirectUri public property
     */
    public $redirectUri;

    /**
     * The publicly available URL you wish to be notified with events as the user progresses through the
     * application. See [Connect Webhook Event](https://docs.finicity.com/connect-webhooks/) for event
     * details.
     * @var string|null $webhook public property
     */
    public $webhook;

    /**
     * The Content Type The Webhooks Events Will Be Sent In. Supported Types `application/json` and
     * `application/xml`
     * @var string|null $webhookContentType public property
     */
    public $webhookContentType;

    /**
     * Allows additional identifiable information to be inserted into the payload of connect webhook events.
     * See this article for [Details](https://docs.finicity.com/connect-custom-webhook-data-and-headers/).
     * @var object|null $webhookData public property
     */
    public $webhookData;

    /**
     * Allows additional identifiable information to be included as headers of connect webhook event. See
     * this article for [Details](https://docs.finicity.com/connect-custom-webhook-data-and-headers/).
     * @var object|null $webhookHeaders public property
     */
    public $webhookHeaders;

    /**
     * The `experience` field allows you to customize: <br> * **Brand**: color and logo <br> * **Icon**:
     * displayed on the Share your data page <br>      <br>**Note**: The Finicity sales engineers (SE) help
     * you set up a default experience for your company when you migrate to Connect 2. For each additional
     * experience you create thereafter, they’ll give you a unique ID. See [Generate 2.0 Connect URL APIs](
     * https://docs.finicity.com/migrate-to-connect-web-sdk-2-0/#migrate-connect-web-sdk-1) <br>
     * <br>**Experience values options**: <br> * **default**: your default experience <br> * **unique ID**:
     * the code for a different experience <br> * **not defined**: If you don’t pass the experience
     * parameter, then Connect’s out of the box default experience (add accounts but no branding) is used.
     * <br>
     * @var string|null $experience public property
     */
    public $experience;

    /**
     * **True**: The URL link expires after a Connect session successfully completes. <br> <br> **Note**:
     * When the `singleUseUrl` and the `experience` parameters are passed in the same call, the
     * `singleUseUrl` value overrides the `singleUseUrl` value configured in the `experience` parameter.
     * @var bool|null $singleUseUrl public property
     */
    public $singleUseUrl;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $partnerId          Initialization value for $this->partnerId
     * @param string  $customerId         Initialization value for $this->customerId
     * @param integer $institutionLoginId Initialization value for $this->institutionLoginId
     * @param string  $redirectUri        Initialization value for $this->redirectUri
     * @param string  $webhook            Initialization value for $this->webhook
     * @param string  $webhookContentType Initialization value for $this->webhookContentType
     * @param object  $webhookData        Initialization value for $this->webhookData
     * @param object  $webhookHeaders     Initialization value for $this->webhookHeaders
     * @param string  $experience         Initialization value for $this->experience
     * @param bool    $singleUseUrl       Initialization value for $this->singleUseUrl
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 10:
                $this->partnerId          = func_get_arg(0);
                $this->customerId         = func_get_arg(1);
                $this->institutionLoginId = func_get_arg(2);
                $this->redirectUri        = func_get_arg(3);
                $this->webhook            = func_get_arg(4);
                $this->webhookContentType = func_get_arg(5);
                $this->webhookData        = func_get_arg(6);
                $this->webhookHeaders     = func_get_arg(7);
                $this->experience         = func_get_arg(8);
                $this->singleUseUrl       = func_get_arg(9);
                break;

            default:
                $this->webhookContentType = 'application/json';
                break;
        }
    }

    
    /**
     * Add an additional property to this model.
     * @param string $name  Name of property
     * @param mixed  $value Value of property
     */
    public function addAdditionalProperty($name, $value)
    {
        $this->additionalProperties[$name] = $value;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['partnerId']          = $this->partnerId;
        $json['customerId']         = $this->customerId;
        $json['institutionLoginId'] = $this->institutionLoginId;
        $json['redirectUri']        = $this->redirectUri;
        $json['webhook']            = $this->webhook;
        $json['webhookContentType'] = $this->webhookContentType;
        $json['webhookData']        = $this->webhookData;
        $json['webhookHeaders']     = $this->webhookHeaders;
        $json['experience']         = $this->experience;
        $json['singleUseUrl']       = $this->singleUseUrl;

        return array_merge($json, $this->additionalProperties);
    }
}
