<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class OptionalConsumerInfo implements JsonSerializable
{
    /**
     * (MVS-optional) The full SSN without hyphens that matches the consumer’s SSN.
     * @required
     * @var string $ssn public property
     */
    public $ssn;

    /**
     * (MVS-optional) The consumer’s date of birth is in Unix epoch time (in seconds).  The timestamp is
     * UTC at the start of day of birth. <br>   <br> **Example**: If the DOB is 1/1/1980, then the
     * timestamp passed is 315576000. <br>   <br> **Note**: DOB’s prior to 1970 result in a negative
     * timestamp; this is acceptable. To avoid errors, the DOB and consumer’s DOB must match.
     * @required
     * @var string $dob public property
     */
    public $dob;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $ssn Initialization value for $this->ssn
     * @param string $dob Initialization value for $this->dob
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->ssn = func_get_arg(0);
            $this->dob = func_get_arg(1);
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
        $json['ssn'] = $this->ssn;
        $json['dob'] = $this->dob;

        return array_merge($json, $this->additionalProperties);
    }
}
