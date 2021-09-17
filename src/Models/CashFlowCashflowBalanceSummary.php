<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowCashflowBalanceSummary implements JsonSerializable
{
    /**
     * List of attributes for each month
     * @required
     * @var \FinicityAPILib\Models\CashFlowMonthlyCashFlowBalanceSummaries[] $monthlyCashFlowBalanceSummaries public property
     */
    public $monthlyCashFlowBalanceSummaries;

    /**
     * Min Daily Balance across entire transaction history  for all accounts
     * @required
     * @var double $minDailyBalance public property
     */
    public $minDailyBalance;

    /**
     * Max Daily Balance across entire transaction history for all accounts
     * @required
     * @var double $maxDailyBalance public property
     */
    public $maxDailyBalance;

    /**
     * Average Daily Balance across twelve months for all accounts
     * @required
     * @var double $twelveMonthAverageDailyBalance public property
     */
    public $twelveMonthAverageDailyBalance;

    /**
     * Average Daily Balance across six months for all accounts
     * @required
     * @var double $sixMonthAverageDailyBalance public property
     */
    public $sixMonthAverageDailyBalance;

    /**
     * Average Daily Balance across two months for all accounts
     * @required
     * @var double $twoMonthAverageDailyBalance public property
     */
    public $twoMonthAverageDailyBalance;

    /**
     * Standard Deviation of Daily Balance across twelve months for all accounts
     * @required
     * @var string $twelveMonthStandardDeviationOfDailyBalance public property
     */
    public $twelveMonthStandardDeviationOfDailyBalance;

    /**
     * Standard Deviation of Daily Balance across six months for all accounts
     * @required
     * @var string $sixMonthStandardDeviationOfDailyBalance public property
     */
    public $sixMonthStandardDeviationOfDailyBalance;

    /**
     * Standard Deviation of Daily Balance across two months for all accounts
     * @required
     * @var string $twoMonthStandardDeviationOfDailyBalance public property
     */
    public $twoMonthStandardDeviationOfDailyBalance;

    /**
     * Number of Days Negative Balance over entire transaction history for all accounts
     * @required
     * @var string $numberOfDaysNegativeBalance public property
     */
    public $numberOfDaysNegativeBalance;

    /**
     * Number of Days Positive Balance over entire transaction history for all accounts
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
     * @param array  $monthlyCashFlowBalanceSummaries            Initialization value for $this-
     *                                                             >monthlyCashFlowBalanceSummaries
     * @param double $minDailyBalance                            Initialization value for $this->minDailyBalance
     * @param double $maxDailyBalance                            Initialization value for $this->maxDailyBalance
     * @param double $twelveMonthAverageDailyBalance             Initialization value for $this-
     *                                                             >twelveMonthAverageDailyBalance
     * @param double $sixMonthAverageDailyBalance                Initialization value for $this-
     *                                                             >sixMonthAverageDailyBalance
     * @param double $twoMonthAverageDailyBalance                Initialization value for $this-
     *                                                             >twoMonthAverageDailyBalance
     * @param string $twelveMonthStandardDeviationOfDailyBalance Initialization value for $this-
     *                                                             >twelveMonthStandardDeviationOfDailyBalance
     * @param string $sixMonthStandardDeviationOfDailyBalance    Initialization value for $this-
     *                                                             >sixMonthStandardDeviationOfDailyBalance
     * @param string $twoMonthStandardDeviationOfDailyBalance    Initialization value for $this-
     *                                                             >twoMonthStandardDeviationOfDailyBalance
     * @param string $numberOfDaysNegativeBalance                Initialization value for $this-
     *                                                             >numberOfDaysNegativeBalance
     * @param string $numberOfDaysPositiveBalance                Initialization value for $this-
     *                                                             >numberOfDaysPositiveBalance
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->monthlyCashFlowBalanceSummaries            = func_get_arg(0);
            $this->minDailyBalance                            = func_get_arg(1);
            $this->maxDailyBalance                            = func_get_arg(2);
            $this->twelveMonthAverageDailyBalance             = func_get_arg(3);
            $this->sixMonthAverageDailyBalance                = func_get_arg(4);
            $this->twoMonthAverageDailyBalance                = func_get_arg(5);
            $this->twelveMonthStandardDeviationOfDailyBalance = func_get_arg(6);
            $this->sixMonthStandardDeviationOfDailyBalance    = func_get_arg(7);
            $this->twoMonthStandardDeviationOfDailyBalance    = func_get_arg(8);
            $this->numberOfDaysNegativeBalance                = func_get_arg(9);
            $this->numberOfDaysPositiveBalance                = func_get_arg(10);
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
        $json['monthlyCashFlowBalanceSummaries']            = $this->monthlyCashFlowBalanceSummaries;
        $json['minDailyBalance']                            = $this->minDailyBalance;
        $json['maxDailyBalance']                            = $this->maxDailyBalance;
        $json['twelveMonthAverageDailyBalance']             = $this->twelveMonthAverageDailyBalance;
        $json['sixMonthAverageDailyBalance']                = $this->sixMonthAverageDailyBalance;
        $json['twoMonthAverageDailyBalance']                = $this->twoMonthAverageDailyBalance;
        $json['twelveMonthStandardDeviationOfDailyBalance'] = $this->twelveMonthStandardDeviationOfDailyBalance;
        $json['sixMonthStandardDeviationOfDailyBalance']    = $this->sixMonthStandardDeviationOfDailyBalance;
        $json['twoMonthStandardDeviationOfDailyBalance']    = $this->twoMonthStandardDeviationOfDailyBalance;
        $json['numberOfDaysNegativeBalance']                = $this->numberOfDaysNegativeBalance;
        $json['numberOfDaysPositiveBalance']                = $this->numberOfDaysPositiveBalance;

        return array_merge($json, $this->additionalProperties);
    }
}
