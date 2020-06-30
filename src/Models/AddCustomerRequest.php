<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Request Structure For The Add Customer Endpoint and Add Testing Customer Endpoint
 */
class AddCustomerRequest implements JsonSerializable
{
    /**
     * The customer’s username, assigned by the partner (a unique identifier), following these rules:
     * minimum 6 characters maximum 255 characters any mix of uppercase, lowercase, numeric, and non-
     * alphabet special characters ! @ . # $ % & * _ – + the use of email in this field is discouraged it
     * is recommended to use a unique non-email identifier Use of special characters may result in an error
     * (e.g. í, ü, etc.)
     * @required
     * @var string $username public property
     */
    public $username;

    /**
     * The customer’s first name(s) / given name(s) (optional)
     * @var string|null $firstName public property
     */
    public $firstName;

    /**
     * The customer’s last name(s) / surname(s) (optional)
     * @var string|null $lastName public property
     */
    public $lastName;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $username  Initialization value for $this->username
     * @param string $firstName Initialization value for $this->firstName
     * @param string $lastName  Initialization value for $this->lastName
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->username  = func_get_arg(0);
            $this->firstName = func_get_arg(1);
            $this->lastName  = func_get_arg(2);
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
        $json['username']  = $this->username;
        $json['firstName'] = $this->firstName;
        $json['lastName']  = $this->lastName;

        return array_merge($json, $this->additionalProperties);
    }
}
