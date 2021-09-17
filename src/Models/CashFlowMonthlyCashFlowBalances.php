<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowMonthlyCashFlowBalances implements JsonSerializable
{
    /**
     * One instance for each complete calendar month in the report
     * @required
     * @var integer $month public property
     */
    public $month;

    /**
     * Min Daily Balance for each month
     * @required
     * @var double $minDailyBalance public property
     */
    public $minDailyBalance;

    /**
     * Max Daily Balance for each month
     * @required
     * @var double $maxDailyBalance public property
     */
    public $maxDailyBalance;

    /**
     * Average Daily Balance for each month
     * @required
     * @var double $averageDailyBalance public property
     */
    public $averageDailyBalance;

    /**
     * Standard Deviation of Daily Balance for each month
     * @required
     * @var string $standardDeviationOfDailyBalance public property
     */
    public $standardDeviationOfDailyBalance;

    /**
     * Number of Days Negative Balance for each month
     * @required
     * @var string $numberOfDaysNegativeBalance public property
     */
    public $numberOfDaysNegativeBalance;

    /**
     * Number of Days positive balance for each month
     * @required
     * @var string $numberOfDaysPositiveBalance public property
     */
    public $numberOfDaysPositiveBalance;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $month                           Initialization value for $this->month
     * @param double  $minDailyBalance                 Initialization value for $this->minDailyBalance
     * @param double  $maxDailyBalance                 Initialization value for $this->maxDailyBalance
     * @param double  $averageDailyBalance             Initialization value for $this->averageDailyBalance
     * @param string  $standardDeviationOfDailyBalance Initialization value for $this-
     *                                                   >standardDeviationOfDailyBalance
     * @param string  $numberOfDaysNegativeBalance     Initialization value for $this->numberOfDaysNegativeBalance
     * @param string  $numberOfDaysPositiveBalance     Initialization value for $this->numberOfDaysPositiveBalance
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->month                           = func_get_arg(0);
            $this->minDailyBalance                 = func_get_arg(1);
            $this->maxDailyBalance                 = func_get_arg(2);
            $this->averageDailyBalance             = func_get_arg(3);
            $this->standardDeviationOfDailyBalance = func_get_arg(4);
            $this->numberOfDaysNegativeBalance     = func_get_arg(5);
            $this->numberOfDaysPositiveBalance     = func_get_arg(6);
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
        $json['month']                           = $this->month;
        $json['minDailyBalance']                 = $this->minDailyBalance;
        $json['maxDailyBalance']                 = $this->maxDailyBalance;
        $json['averageDailyBalance']             = $this->averageDailyBalance;
        $json['standardDeviationOfDailyBalance'] = $this->standardDeviationOfDailyBalance;
        $json['numberOfDaysNegativeBalance']     = $this->numberOfDaysNegativeBalance;
        $json['numberOfDaysPositiveBalance']     = $this->numberOfDaysPositiveBalance;

        return array_merge($json, $this->additionalProperties);
    }
}
