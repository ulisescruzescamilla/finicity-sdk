<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The address for the financial institution
 */
class InstitutionAddress implements JsonSerializable
{
    /**
     * The city of the institution’s headquarters
     * @var string|null $city public property
     */
    public $city;

    /**
     * Two-letter code for the state of the institution’s headquarters
     * @var string|null $state public property
     */
    public $state;

    /**
     * The country of the institution’s headquarters
     * @var string|null $country public property
     */
    public $country;

    /**
     * The postal code of the institution’s headquarters
     * @var string|null $postalCode public property
     */
    public $postalCode;

    /**
     * Address information for the institution’s headquarters
     * @var string|null $addressLine1 public property
     */
    public $addressLine1;

    /**
     * Address information for the institution’s headquarters
     * @var string|null $addressLine2 public property
     */
    public $addressLine2;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $city         Initialization value for $this->city
     * @param string $state        Initialization value for $this->state
     * @param string $country      Initialization value for $this->country
     * @param string $postalCode   Initialization value for $this->postalCode
     * @param string $addressLine1 Initialization value for $this->addressLine1
     * @param string $addressLine2 Initialization value for $this->addressLine2
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->city         = func_get_arg(0);
            $this->state        = func_get_arg(1);
            $this->country      = func_get_arg(2);
            $this->postalCode   = func_get_arg(3);
            $this->addressLine1 = func_get_arg(4);
            $this->addressLine2 = func_get_arg(5);
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
        $json['city']         = $this->city;
        $json['state']        = $this->state;
        $json['country']      = $this->country;
        $json['postalCode']   = $this->postalCode;
        $json['addressLine1'] = $this->addressLine1;
        $json['addressLine2'] = $this->addressLine2;

        return array_merge($json, $this->additionalProperties);
    }
}
