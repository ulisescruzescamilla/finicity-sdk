<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollVOEIncomeRecord implements JsonSerializable
{
    /**
     * The current pay frequency: <br> * `Daily` <br> * `Weekly` <br> * `Bi-Weekly` <br> * `Bi-Weekly Odd`
     * (Bi-Weekly pay on odd weeks) <br> * `Bi-Weekly Even` (Bi-Weekly pay on even weeks) <br> * `Semi-
     * Monthly` <br> * `Monthly` <br> * `Quarterly` <br>* `Semi-Annual` <br> * `Annual` <br>  * `Every 2.6
     * wks` <br> * `Every 4 wks` <br> * `Every 5.2 wks`
     * @required
     * @var string $payFrequency public property
     */
    public $payFrequency;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $payFrequency Initialization value for $this->payFrequency
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->payFrequency = func_get_arg(0);
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
        $json['payFrequency'] = $this->payFrequency;

        return array_merge($json, $this->additionalProperties);
    }
}
