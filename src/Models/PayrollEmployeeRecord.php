<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollEmployeeRecord implements JsonSerializable
{
    /**
     * Full name of the employee: first, middle (if stated), and last name.
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * First name of employee
     * @required
     * @var string $givenName public property
     */
    public $givenName;

    /**
     * Middle name of employee, if stated
     * @var string|null $middleName public property
     */
    public $middleName;

    /**
     * Last name of employee
     * @required
     * @var string $familyName public property
     */
    public $familyName;

    /**
     * Array of addresses
     * @var \FinicityAPILib\Models\PayrollEmployeeAddress[]|null $address public property
     */
    public $address;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name       Initialization value for $this->name
     * @param string $givenName  Initialization value for $this->givenName
     * @param string $middleName Initialization value for $this->middleName
     * @param string $familyName Initialization value for $this->familyName
     * @param array  $address    Initialization value for $this->address
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->name       = func_get_arg(0);
            $this->givenName  = func_get_arg(1);
            $this->middleName = func_get_arg(2);
            $this->familyName = func_get_arg(3);
            $this->address    = func_get_arg(4);
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
        $json['name']       = $this->name;
        $json['givenName']  = $this->givenName;
        $json['middleName'] = $this->middleName;
        $json['familyName'] = $this->familyName;
        $json['address']    = $this->address;

        return array_merge($json, $this->additionalProperties);
    }
}
