<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InstitutionsCertificationSubscriptionRequest implements JsonSerializable
{
    /**
     * Webhook URL to send the notifications to
     * @required
     * @var string $webhookUrl public property
     */
    public $webhookUrl;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $webhookUrl Initialization value for $this->webhookUrl
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->webhookUrl = func_get_arg(0);
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
        $json['webhookUrl'] = $this->webhookUrl;

        return array_merge($json, $this->additionalProperties);
    }
}
