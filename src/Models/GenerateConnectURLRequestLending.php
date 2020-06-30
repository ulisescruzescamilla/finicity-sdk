<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateConnectURLRequestLending implements JsonSerializable
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
     * Finicity’s consumer ID. Obtained from the Create Consumer call. <br> *Required for any connect type
     * that generate a report*
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * The type of connect flow you want for the customer/consumer. See Finicity Connect Type For
     * Definitions.
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * ID of the specific Institution login flow to present to the Customer/Consumer. For any lending and
     * report type flow this will present this institution first to the customer to add and then they may
     * add additional institutions after this first default one.
     * @var integer|null $institutionId public property
     */
    public $institutionId;

    /**
     * Boolean indicating if Connect should generate the report at the end of the flow
     * @var bool|null $skipReport public property
     */
    public $skipReport;

    /**
     * The `fromDate` param is an Epoch Timestamp (in seconds), such as “1494449017”. Without this param,
     * the report defaults to 6 months if available. If included, the epoch timestamp should be 10 digits
     * long, and be within two years of the present day. Extending the epoch timestamp beyond 10 digits
     * will default back to six months of data. This is an optional field for use with only “voa” Connect
     * type. The fromDate param should not be used with the “voi” Connect type.
     * @var string|null $fromDate public property
     */
    public $fromDate;

    /**
     * Enter the value 2 here if the consumer needs to upload the 2 most recent pay statements. Applicable
     * only for VOIE products.
     * @var string|null $paystubs public property
     */
    public $paystubs;

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
     * Designate up to 5 custom fields that you would like associated with the report upon generation by
     * providing a label for the field and a value for the field.  Set the shown variable to true if you
     * want the custom field to display in the JSON, XML, and PDF reports. Set the shown variable to false
     * if you do not wish to see this field in the report. All custom fields will display in the Reseller
     * Billing endpoint.   This is optional.
     * @var \FinicityAPILib\Models\ReportCustomFields[]|null $reportCustomFields public property
     */
    public $reportCustomFields;

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
     * @param string  $consumerId          Initialization value for $this->consumerId
     * @param string  $type                Initialization value for $this->type
     * @param integer $institutionId       Initialization value for $this->institutionId
     * @param bool    $skipReport          Initialization value for $this->skipReport
     * @param string  $fromDate            Initialization value for $this->fromDate
     * @param string  $paystubs            Initialization value for $this->paystubs
     * @param string  $redirectUri         Initialization value for $this->redirectUri
     * @param string  $webhook             Initialization value for $this->webhook
     * @param string  $webhookContentType  Initialization value for $this->webhookContentType
     * @param object  $webhookData         Initialization value for $this->webhookData
     * @param object  $webhookHeaders      Initialization value for $this->webhookHeaders
     * @param object  $institutionSettings Initialization value for $this->institutionSettings
     * @param array   $reportCustomFields  Initialization value for $this->reportCustomFields
     * @param string  $analytics           Initialization value for $this->analytics
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 16:
                $this->partnerId           = func_get_arg(0);
                $this->customerId          = func_get_arg(1);
                $this->consumerId          = func_get_arg(2);
                $this->type                = func_get_arg(3);
                $this->institutionId       = func_get_arg(4);
                $this->skipReport          = func_get_arg(5);
                $this->fromDate            = func_get_arg(6);
                $this->paystubs            = func_get_arg(7);
                $this->redirectUri         = func_get_arg(8);
                $this->webhook             = func_get_arg(9);
                $this->webhookContentType  = func_get_arg(10);
                $this->webhookData         = func_get_arg(11);
                $this->webhookHeaders      = func_get_arg(12);
                $this->institutionSettings = func_get_arg(13);
                $this->reportCustomFields  = func_get_arg(14);
                $this->analytics           = func_get_arg(15);
                break;

            default:
                $this->skipReport = false;
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
        $json['consumerId']          = $this->consumerId;
        $json['type']                = $this->type;
        $json['institutionId']       = $this->institutionId;
        $json['skipReport']          = $this->skipReport;
        $json['fromDate']            = $this->fromDate;
        $json['paystubs']            = $this->paystubs;
        $json['redirectUri']         = $this->redirectUri;
        $json['webhook']             = $this->webhook;
        $json['webhookContentType']  = $this->webhookContentType;
        $json['webhookData']         = $this->webhookData;
        $json['webhookHeaders']      = $this->webhookHeaders;
        $json['institutionSettings'] = $this->institutionSettings;
        $json['reportCustomFields']  = $this->reportCustomFields;
        $json['analytics']           = $this->analytics;

        return array_merge($json, $this->additionalProperties);
    }
}
