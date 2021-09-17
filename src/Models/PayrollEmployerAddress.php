<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollEmployerAddress implements JsonSerializable
{
    /**
     * Employer address as stated by the employer in the payroll system
     * @var string|null $address1 public property
     */
    public $address1;

    /**
     * Employer city as stated by the employer in the payroll system
     * @var string|null $city public property
     */
    public $city;

    /**
     * Employer state as stated by the employer in the payroll system
     * @var string|null $state public property
     */
    public $state;

    /**
     * Employer zip code as stated by the employer in the payroll system
     * @var string|null $zip public property
     */
    public $zip;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $address1 Initialization value for $this->address1
     * @param string $city     Initialization value for $this->city
     * @param string $state    Initialization value for $this->state
     * @param string $zip      Initialization value for $this->zip
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->address1 = func_get_arg(0);
            $this->city     = func_get_arg(1);
            $this->state    = func_get_arg(2);
            $this->zip      = func_get_arg(3);
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
        $json['address1'] = $this->address1;
        $json['city']     = $this->city;
        $json['state']    = $this->state;
        $json['zip']      = $this->zip;

        return array_merge($json, $this->additionalProperties);
    }
}
