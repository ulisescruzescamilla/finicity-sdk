<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class DirectDeposit implements JsonSerializable
{
    /**
     * The amount of the deposit.
     * @var double|null $amountCurrent public property
     */
    public $amountCurrent;

    /**
     * The last four numbers of the account the deposit went into.
     * @var string|null $accountLastFour public property
     */
    public $accountLastFour;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param double $amountCurrent   Initialization value for $this->amountCurrent
     * @param string $accountLastFour Initialization value for $this->accountLastFour
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->amountCurrent   = func_get_arg(0);
            $this->accountLastFour = func_get_arg(1);
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
        $json['amountCurrent']   = $this->amountCurrent;
        $json['accountLastFour'] = $this->accountLastFour;

        return array_merge($json, $this->additionalProperties);
    }
}
