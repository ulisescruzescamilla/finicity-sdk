<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class TpAccounts implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Account[] $accounts public property
     */
    public $accounts;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array $accounts Initialization value for $this->accounts
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->accounts = func_get_arg(0);
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
        $json['accounts'] = $this->accounts;

        return array_merge($json, $this->additionalProperties);
    }
}
