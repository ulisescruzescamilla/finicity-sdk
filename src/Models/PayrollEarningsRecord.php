<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollEarningsRecord implements JsonSerializable
{
    /**
     * The name of the earning as described by the payroll provider, if available. Note: Today the response
     * provides the earnings summed into the defined earning types. In the future we may be able to provide
     * the full earnings breakdown, at which point this field would be used to pass the earnings name as
     * would be displayed on the employee's paystub.
     * @var string|null $name public property
     */
    public $name;

    /**
     * Earnings type for each earning. Types are: `base`, `overtime`, `bonus`, `other`, `commission`
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Rate for each earning if available.
     * @var double|null $rate public property
     */
    public $rate;

    /**
     * Earnings amount for each earning type
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * Earnings YTD amount if available
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
     * @param string $name      Initialization value for $this->name
     * @param string $type      Initialization value for $this->type
     * @param double $rate      Initialization value for $this->rate
     * @param double $amount    Initialization value for $this->amount
     * @param double $amountYTD Initialization value for $this->amountYTD
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->name      = func_get_arg(0);
            $this->type      = func_get_arg(1);
            $this->rate      = func_get_arg(2);
            $this->amount    = func_get_arg(3);
            $this->amountYTD = func_get_arg(4);
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
        $json['name']      = $this->name;
        $json['type']      = $this->type;
        $json['rate']      = $this->rate;
        $json['amount']    = $this->amount;
        $json['amountYTD'] = $this->amountYTD;

        return array_merge($json, $this->additionalProperties);
    }
}
