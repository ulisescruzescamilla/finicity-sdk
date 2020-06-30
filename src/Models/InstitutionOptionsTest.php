<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InstitutionOptionsTest implements JsonSerializable
{
    /**
     * The institutionId
     * @required
     * @var string $institutionId public property
     */
    public $institutionId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $institutionId Initialization value for $this->institutionId
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->institutionId = func_get_arg(0);
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
        $json['institutionId'] = $this->institutionId;

        return array_merge($json, $this->additionalProperties);
    }
}
