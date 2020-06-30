<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The fields to be modified for a customer record
 */
class ModifyCustomerRequest implements JsonSerializable
{
    /**
     * The first name associated with the customer
     * @required
     * @var string $firstName public property
     */
    public $firstName;

    /**
     * The last name associated with the customer
     * @required
     * @var string $lastName public property
     */
    public $lastName;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $firstName Initialization value for $this->firstName
     * @param string $lastName  Initialization value for $this->lastName
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->firstName = func_get_arg(0);
            $this->lastName  = func_get_arg(1);
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
        $json['firstName'] = $this->firstName;
        $json['lastName']  = $this->lastName;

        return array_merge($json, $this->additionalProperties);
    }
}
