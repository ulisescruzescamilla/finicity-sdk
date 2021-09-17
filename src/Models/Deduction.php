<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Deduction implements JsonSerializable
{
    /**
     * The normalized category of the deductions in the format [type][number]. The number is the will be
     * the iterating number of the type’s occurrence starting at one.
     * @var string|null $name public property
     */
    public $name;

    /**
     * The deduction line’s deduction type description
     * @var string|null $description public property
     */
    public $description;

    /**
     * The amount for the deduction line deducted from employee’s pay for the specified pay period.
     * @var double|null $amountCurrent public property
     */
    public $amountCurrent;

    /**
     * The amount for the deduction line being deducted from the employee’s pay for the current pay year.
     * @var double|null $amountYTD public property
     */
    public $amountYTD;

    /**
     * Categorization based on the deduction line’s description.
     * @var string|null $type public property
     */
    public $type;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name          Initialization value for $this->name
     * @param string $description   Initialization value for $this->description
     * @param double $amountCurrent Initialization value for $this->amountCurrent
     * @param double $amountYTD     Initialization value for $this->amountYTD
     * @param string $type          Initialization value for $this->type
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->name          = func_get_arg(0);
            $this->description   = func_get_arg(1);
            $this->amountCurrent = func_get_arg(2);
            $this->amountYTD     = func_get_arg(3);
            $this->type          = func_get_arg(4);
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
        $json['description']   = $this->description;
        $json['amountCurrent'] = $this->amountCurrent;
        $json['amountYTD']     = $this->amountYTD;
        $json['type']          = $this->type;

        return array_merge($json, $this->additionalProperties);
    }
}
