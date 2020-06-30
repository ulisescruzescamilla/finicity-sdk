<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Employee implements JsonSerializable
{
    /**
     * The name of the employee
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The first address line of the employee
     * @required
     * @var string $address1 public property
     */
    public $address1;

    /**
     * The second address line of the employee
     * @required
     * @var string $address2 public property
     */
    public $address2;

    /**
     * The employee’s city
     * @required
     * @var string $city public property
     */
    public $city;

    /**
     * The employee’s state
     * @required
     * @var string $state public property
     */
    public $state;

    /**
     * The employee’s zip
     * @required
     * @var string $zip public property
     */
    public $zip;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name     Initialization value for $this->name
     * @param string $address1 Initialization value for $this->address1
     * @param string $address2 Initialization value for $this->address2
     * @param string $city     Initialization value for $this->city
     * @param string $state    Initialization value for $this->state
     * @param string $zip      Initialization value for $this->zip
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->name     = func_get_arg(0);
            $this->address1 = func_get_arg(1);
            $this->address2 = func_get_arg(2);
            $this->city     = func_get_arg(3);
            $this->state    = func_get_arg(4);
            $this->zip      = func_get_arg(5);
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
        $json['name']     = $this->name;
        $json['address1'] = $this->address1;
        $json['address2'] = $this->address2;
        $json['city']     = $this->city;
        $json['state']    = $this->state;
        $json['zip']      = $this->zip;

        return array_merge($json, $this->additionalProperties);
    }
}
