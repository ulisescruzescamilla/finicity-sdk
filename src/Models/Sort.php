<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Sort implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var bool $sorted public property
     */
    public $sorted;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $unsorted public property
     */
    public $unsorted;

    /**
     * @todo Write general description for this property
     * @required
     * @maps empty
     * @var bool $mempty public property
     */
    public $mempty;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param bool $sorted   Initialization value for $this->sorted
     * @param bool $unsorted Initialization value for $this->unsorted
     * @param bool $mempty   Initialization value for $this->mempty
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->sorted   = func_get_arg(0);
            $this->unsorted = func_get_arg(1);
            $this->mempty   = func_get_arg(2);
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
        $json['sorted']   = $this->sorted;
        $json['unsorted'] = $this->unsorted;
        $json['empty']    = $this->mempty;

        return array_merge($json, $this->additionalProperties);
    }
}
