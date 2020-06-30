<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The routing and account number information to initiate ACH transfers
 */
class ACHDetails implements JsonSerializable
{
    /**
     * The routing number of the financial institution for this specific customers account
     * @required
     * @var string $routingNumber public property
     */
    public $routingNumber;

    /**
     * The account number for initiating ACH transfers for this account
     * @required
     * @var string $realAccountNumber public property
     */
    public $realAccountNumber;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $routingNumber     Initialization value for $this->routingNumber
     * @param string $realAccountNumber Initialization value for $this->realAccountNumber
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->routingNumber     = func_get_arg(0);
            $this->realAccountNumber = func_get_arg(1);
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
        $json['routingNumber']     = $this->routingNumber;
        $json['realAccountNumber'] = $this->realAccountNumber;

        return array_merge($json, $this->additionalProperties);
    }
}
