<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The response for the Get App Registration Status endpoint which returns an array of App Status
 * objects to be able to determine their registration status
 */
class AppStatusesV1 implements JsonSerializable
{
    /**
     * List of App Status's
     * @required
     * @var \FinicityAPILib\Models\AppStatusV1[] $status public property
     */
    public $status;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array $status Initialization value for $this->status
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->status = func_get_arg(0);
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
        $json['status'] = $this->status;

        return array_merge($json, $this->additionalProperties);
    }
}
