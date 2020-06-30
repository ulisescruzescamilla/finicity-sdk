<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PartnerCredentials implements JsonSerializable
{
    /**
     * Partner ID From Developer Portal
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * Partner Secret From Developer Portal
     * @required
     * @var string $partnerSecret public property
     */
    public $partnerSecret;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $partnerId     Initialization value for $this->partnerId
     * @param string $partnerSecret Initialization value for $this->partnerSecret
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->partnerId     = func_get_arg(0);
            $this->partnerSecret = func_get_arg(1);
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
        $json['partnerId']     = $this->partnerId;
        $json['partnerSecret'] = $this->partnerSecret;

        return array_merge($json, $this->additionalProperties);
    }
}
