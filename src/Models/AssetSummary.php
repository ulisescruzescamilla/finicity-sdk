<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AssetSummary implements JsonSerializable
{
    /**
     * checking / savings / moneyMarket / cd / investment*
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Current balance of the account
     * @required
     * @var double $currentBalance public property
     */
    public $currentBalance;

    /**
     * Two month average daily balance of the account
     * @required
     * @var double $twoMonthAverage public property
     */
    public $twoMonthAverage;

    /**
     * Six month average daily balance of the account
     * @required
     * @var double $sixMonthAverage public property
     */
    public $sixMonthAverage;

    /**
     * Beginning balance of account per the time period in the report
     * @required
     * @var double $beginningBalance public property
     */
    public $beginningBalance;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $type             Initialization value for $this->type
     * @param double $currentBalance   Initialization value for $this->currentBalance
     * @param double $twoMonthAverage  Initialization value for $this->twoMonthAverage
     * @param double $sixMonthAverage  Initialization value for $this->sixMonthAverage
     * @param double $beginningBalance Initialization value for $this->beginningBalance
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->type             = func_get_arg(0);
            $this->currentBalance   = func_get_arg(1);
            $this->twoMonthAverage  = func_get_arg(2);
            $this->sixMonthAverage  = func_get_arg(3);
            $this->beginningBalance = func_get_arg(4);
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
        $json['type']             = $this->type;
        $json['currentBalance']   = $this->currentBalance;
        $json['twoMonthAverage']  = $this->twoMonthAverage;
        $json['sixMonthAverage']  = $this->sixMonthAverage;
        $json['beginningBalance'] = $this->beginningBalance;

        return array_merge($json, $this->additionalProperties);
    }
}
