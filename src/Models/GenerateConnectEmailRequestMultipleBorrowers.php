<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateConnectEmailRequestMultipleBorrowers implements JsonSerializable
{
    /**
     * The partner id you can obtain from your Finicity developer dashboard
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * The customers' information
     * @required
     * @var array $customers public property
     */
    public $customers;

    /**
     * The url that customers will be redirected to after completing Finicity Connect.
     * @var string|null $redirectUri public property
     */
    public $redirectUri;

    /**
     * The report type you wish to have generated for you. Valid types include ‘voa’, ‘voi’, and
     * ‘aggregation’
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The publicly available url you wish to be posted to when the user starts Finicity Connect, and
     * completes, it etc.  This is an optional field
     * @var string|null $webhook public property
     */
    public $webhook;

    /**
     * The format of the data you wish to be posted to your server. Valid values are ‘application/json’ and
     * ‘application/xml’ This field is optional.
     * @var string|null $webhookContentType public property
     */
    public $webhookContentType;

    /**
     * Allows additional identifiable information to be inserted into webhooks (value1, value2, etc.).
     * Alternative naming conventions may be desired in place of value1, value2 for specific values (e.g.
     * loanNumber, currentDate, etc.) This field is optional.
     * @var object|null $webhookData public property
     */
    public $webhookData;

    /**
     * Headers to be included with webhook events
     * @var object|null $webhookHeaders public property
     */
    public $webhookHeaders;

    /**
     * Institution id (required for type=lite)
     * @var integer|null $institutionId public property
     */
    public $institutionId;

    /**
     * oauthOptions for oauthEnabled institutions
     * @maps oauthOptions
     * @var \FinicityAPILib\Models\ConnectOauthOptions|null $oauth_Options public property
     */
    public $oauth_Options;

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
     * Google Analytics can be used with Connect to provide an additional layer of transparency of end user
     * engagement. This field is optional
     * @var string|null $analytics public property
     */
    public $analytics;

    /**
     * Boolean indicating if Connect should generate the report
     * @var bool|null $skipReport public property
     */
    public $skipReport;

    /**
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\ConnectEmailOptions|null $email public property
     */
    public $email;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string              $partnerId          Initialization value for $this->partnerId
     * @param array               $customers          Initialization value for $this->customers
     * @param string              $redirectUri        Initialization value for $this->redirectUri
     * @param string              $type               Initialization value for $this->type
     * @param string              $webhook            Initialization value for $this->webhook
     * @param string              $webhookContentType Initialization value for $this->webhookContentType
     * @param object              $webhookData        Initialization value for $this->webhookData
     * @param object              $webhookHeaders     Initialization value for $this->webhookHeaders
     * @param integer             $institutionId      Initialization value for $this->institutionId
     * @param ConnectOauthOptions $oauth_Options      Initialization value for $this->oauth_Options
     * @param array               $reportCustomFields Initialization value for $this->reportCustomFields
     * @param string              $analytics          Initialization value for $this->analytics
     * @param bool                $skipReport         Initialization value for $this->skipReport
     * @param ConnectEmailOptions $email              Initialization value for $this->email
     */
    public function __construct()
    {
        if (14 == func_num_args()) {
            $this->partnerId          = func_get_arg(0);
            $this->customers          = func_get_arg(1);
            $this->redirectUri        = func_get_arg(2);
            $this->type               = func_get_arg(3);
            $this->webhook            = func_get_arg(4);
            $this->webhookContentType = func_get_arg(5);
            $this->webhookData        = func_get_arg(6);
            $this->webhookHeaders     = func_get_arg(7);
            $this->institutionId      = func_get_arg(8);
            $this->oauth_Options      = func_get_arg(9);
            $this->reportCustomFields = func_get_arg(10);
            $this->analytics          = func_get_arg(11);
            $this->skipReport         = func_get_arg(12);
            $this->email              = func_get_arg(13);
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
        $json['customers']          = $this->customers;
        $json['redirectUri']        = $this->redirectUri;
        $json['type']               = $this->type;
        $json['webhook']            = $this->webhook;
        $json['webhookContentType'] = $this->webhookContentType;
        $json['webhookData']        = $this->webhookData;
        $json['webhookHeaders']     = $this->webhookHeaders;
        $json['institutionId']      = $this->institutionId;
        $json['oauthOptions']       = $this->oauth_Options;
        $json['reportCustomFields'] = $this->reportCustomFields;
        $json['analytics']          = $this->analytics;
        $json['skipReport']         = $this->skipReport;
        $json['email']              = $this->email;

        return array_merge($json, $this->additionalProperties);
    }
}
