<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Categorization1 implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $normalizedPayeeName public property
     */
    public $normalizedPayeeName;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $category public property
     */
    public $category;

    /**
     * @todo Write general description for this property
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
     * @param string $country             Initialization value for $this->country
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->normalizedPayeeName = func_get_arg(0);
            $this->category            = func_get_arg(1);
            $this->country             = func_get_arg(2);
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
        $json['country']             = $this->country;

        return array_merge($json, $this->additionalProperties);
    }
}
