<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InstitutionsCertificationSubscriptionResponse implements JsonSerializable
{
    /**
     * indicates if the subscription was successfully enabled
     * @required
     * @var bool $success public property
     */
    public $success;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param bool $success Initialization value for $this->success
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->success = func_get_arg(0);
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
        $json['success'] = $this->success;

        return array_merge($json, $this->additionalProperties);
    }
}
