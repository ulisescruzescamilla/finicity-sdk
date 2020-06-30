<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ModifyPartnerCredentials implements JsonSerializable
{
    /**
     * Partner ID from Developer Portal
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * Partner Secret from Developer Portal
     * @required
     * @var string $partnerSecret public property
     */
    public $partnerSecret;

    /**
     * The Value For The New Partner Secret To Be Change To
     * @required
     * @var string $newPartnerSecret public property
     */
    public $newPartnerSecret;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $partnerId        Initialization value for $this->partnerId
     * @param string $partnerSecret    Initialization value for $this->partnerSecret
     * @param string $newPartnerSecret Initialization value for $this->newPartnerSecret
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->partnerId        = func_get_arg(0);
            $this->partnerSecret    = func_get_arg(1);
            $this->newPartnerSecret = func_get_arg(2);
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
        $json['partnerId']        = $this->partnerId;
        $json['partnerSecret']    = $this->partnerSecret;
        $json['newPartnerSecret'] = $this->newPartnerSecret;

        return array_merge($json, $this->additionalProperties);
    }
}
