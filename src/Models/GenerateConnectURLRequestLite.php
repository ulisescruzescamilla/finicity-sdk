<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateConnectURLRequestLite implements JsonSerializable
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
     * The type of connect flow you want for the customer/consumer. See Finicity Connect Type For
     * Definitions.
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * ID of the specific Institution login flow to present to the Customer/Consumer <br> *Only supported
     * for connect type`lite`*
     * @required
     * @var integer $institutionId public property
     */
    public $institutionId;

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
     * Advanced options for configuration of which institutions to display in. See this article for
     * [Details](https://docs.finicity.com/connect-institution-settings/)
     * @var object|null $institutionSettings public property
     */
    public $institutionSettings;

    /**
     * Google Analytics or Adobe Analytics can be used with Connect to provide an additional layer of
     * transparency of end user engagement. This is optional.
     * @var string|null $analytics public property
     */
    public $analytics;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $partnerId           Initialization value for $this->partnerId
     * @param string  $customerId          Initialization value for $this->customerId
     * @param string  $type                Initialization value for $this->type
     * @param integer $institutionId       Initialization value for $this->institutionId
     * @param string  $redirectUri         Initialization value for $this->redirectUri
     * @param string  $webhook             Initialization value for $this->webhook
     * @param string  $webhookContentType  Initialization value for $this->webhookContentType
     * @param object  $webhookData         Initialization value for $this->webhookData
     * @param object  $webhookHeaders      Initialization value for $this->webhookHeaders
     * @param object  $institutionSettings Initialization value for $this->institutionSettings
     * @param string  $analytics           Initialization value for $this->analytics
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 11:
                $this->partnerId           = func_get_arg(0);
                $this->customerId          = func_get_arg(1);
                $this->type                = func_get_arg(2);
                $this->institutionId       = func_get_arg(3);
                $this->redirectUri         = func_get_arg(4);
                $this->webhook             = func_get_arg(5);
                $this->webhookContentType  = func_get_arg(6);
                $this->webhookData         = func_get_arg(7);
                $this->webhookHeaders      = func_get_arg(8);
                $this->institutionSettings = func_get_arg(9);
                $this->analytics           = func_get_arg(10);
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
        $json['partnerId']           = $this->partnerId;
        $json['customerId']          = $this->customerId;
        $json['type']                = $this->type;
        $json['institutionId']       = $this->institutionId;
        $json['redirectUri']         = $this->redirectUri;
        $json['webhook']             = $this->webhook;
        $json['webhookContentType']  = $this->webhookContentType;
        $json['webhookData']         = $this->webhookData;
        $json['webhookHeaders']      = $this->webhookHeaders;
        $json['institutionSettings'] = $this->institutionSettings;
        $json['analytics']           = $this->analytics;

        return array_merge($json, $this->additionalProperties);
    }
}
