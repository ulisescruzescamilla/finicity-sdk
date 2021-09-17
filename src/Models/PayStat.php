<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayStat implements JsonSerializable
{
    /**
     * The normalized category of the earnings with a number appended. The number is the will be the
     * iterating number of the type’s occurrence starting at one.
     * @var string|null $name public property
     */
    public $name;

    /**
     * Categorization based on the earning line’s description.
     * @var string|null $type public property
     */
    public $type;

    /**
     * The earnings line’s pay type description
     * @var string|null $description public property
     */
    public $description;

    /**
     * The amount for the earning line paid out to the employee for the specified pay period.
     * @var double|null $amountCurrent public property
     */
    public $amountCurrent;

    /**
     * The amount for the earning line being paid out to the employee for the current pay year.
     * @var double|null $amountYTD public property
     */
    public $amountYTD;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name          Initialization value for $this->name
     * @param string $type          Initialization value for $this->type
     * @param string $description   Initialization value for $this->description
     * @param double $amountCurrent Initialization value for $this->amountCurrent
     * @param double $amountYTD     Initialization value for $this->amountYTD
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->name          = func_get_arg(0);
            $this->type          = func_get_arg(1);
            $this->description   = func_get_arg(2);
            $this->amountCurrent = func_get_arg(3);
            $this->amountYTD     = func_get_arg(4);
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
        $json['name']          = $this->name;
        $json['type']          = $this->type;
        $json['description']   = $this->description;
        $json['amountCurrent'] = $this->amountCurrent;
        $json['amountYTD']     = $this->amountYTD;

        return array_merge($json, $this->additionalProperties);
    }
}
