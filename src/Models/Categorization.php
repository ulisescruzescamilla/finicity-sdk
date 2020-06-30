<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Categorization Record
 */
class Categorization implements JsonSerializable
{
    /**
     * A normalized payee, derived from the transaction’s description and memo fields.
     * @required
     * @var string $normalizedPayeeName public property
     */
    public $normalizedPayeeName;

    /**
     * One of the values from Categories (assigned based on the payee name)
     * @required
     * @var string $category public property
     */
    public $category;

    /**
     * Combines the description and memo data together, removes any duplicated information from description
     * to memo, and removes any numbers or special characters
     * @required
     * @var string $bestRepresentation public property
     */
    public $bestRepresentation;

    /**
     * City of transaction (if available)
     * @var string|null $city public property
     */
    public $city;

    /**
     * State of transaction (if available)
     * @var string|null $state public property
     */
    public $state;

    /**
     * @todo Write general description for this property
     * @var string|null $postalCode public property
     */
    public $postalCode;

    /**
     * Country where the transaction occurred
     * @required
     * @var string $country public property
     */
    public $country;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $normalizedPayeeName Initialization value for $this->normalizedPayeeName
     * @param string $category            Initialization value for $this->category
     * @param string $bestRepresentation  Initialization value for $this->bestRepresentation
     * @param string $city                Initialization value for $this->city
     * @param string $state               Initialization value for $this->state
     * @param string $postalCode          Initialization value for $this->postalCode
     * @param string $country             Initialization value for $this->country
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->normalizedPayeeName = func_get_arg(0);
            $this->category            = func_get_arg(1);
            $this->bestRepresentation  = func_get_arg(2);
            $this->city                = func_get_arg(3);
            $this->state               = func_get_arg(4);
            $this->postalCode          = func_get_arg(5);
            $this->country             = func_get_arg(6);
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
        $json['normalizedPayeeName'] = $this->normalizedPayeeName;
        $json['category']            = $this->category;
        $json['bestRepresentation']  = $this->bestRepresentation;
        $json['city']                = $this->city;
        $json['state']               = $this->state;
        $json['postalCode']          = $this->postalCode;
        $json['country']             = $this->country;

        return array_merge($json, $this->additionalProperties);
    }
}
