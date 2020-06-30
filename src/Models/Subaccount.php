<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Subaccount implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $subaccountNumber public property
     */
    public $subaccountNumber;

    /**
     * @todo Write general description for this property
     * @var string|null $subaccountName public property
     */
    public $subaccountName;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $subaccountNumber Initialization value for $this->subaccountNumber
     * @param string $subaccountName   Initialization value for $this->subaccountName
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->subaccountNumber = func_get_arg(0);
            $this->subaccountName   = func_get_arg(1);
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
        $json['subaccountNumber'] = $this->subaccountNumber;
        $json['subaccountName']   = $this->subaccountName;

        return array_merge($json, $this->additionalProperties);
    }
}
