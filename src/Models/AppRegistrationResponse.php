<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AppRegistrationResponse implements JsonSerializable
{
    /**
     * An identifier to track the application registration request
     * @required
     * @var integer $preAppId public property
     */
    public $preAppId;

    /**
     * The status of the app registration request. When submitted starts as P for pending.
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $preAppId Initialization value for $this->preAppId
     * @param string  $status   Initialization value for $this->status
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->preAppId = func_get_arg(0);
            $this->status   = func_get_arg(1);
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
        $json['preAppId'] = $this->preAppId;
        $json['status']   = $this->status;

        return array_merge($json, $this->additionalProperties);
    }
}
