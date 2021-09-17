<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowMonthlyCashFlowCreditSummaries implements JsonSerializable
{
    /**
     * One instance for each complete calendar month in the report
     * @required
     * @var integer $month public property
     */
    public $month;

    /**
     * Number of credits by month across all accounts
     * @required
     * @var string $numberOfCredits public property
     */
    public $numberOfCredits;

    /**
     * Total amount of credits by month across all accounts
     * @required
     * @var double $totalCreditsAmount public property
     */
    public $totalCreditsAmount;

    /**
     * Largest credit by month across all accounts
     * @required
     * @var double $largestCredit public property
     */
    public $largestCredit;

    /**
     * Number of credits by month (less transfers) across all accounts
     * @required
     * @var string $numberOfCreditsLessTransfers public property
     */
    public $numberOfCreditsLessTransfers;

    /**
     * Total amount of credits by month (less transfers) across all accounts
     * @required
     * @var double $totalCreditsAmountLessTransfers public property
     */
    public $totalCreditsAmountLessTransfers;

    /**
     * The average credit amount
     * @required
     * @var double $averageCreditAmount public property
     */
    public $averageCreditAmount;

    /**
     * The estimated number of loan deposits by month
     * @required
     * @var string $estimatedNumberOfLoanDeposits public property
     */
    public $estimatedNumberOfLoanDeposits;

    /**
     * The estimated loan deposit amount by month
     * @required
     * @var double $estimatedLoanDepositAmount public property
     */
    public $estimatedLoanDepositAmount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $month                           Initialization value for $this->month
     * @param string  $numberOfCredits                 Initialization value for $this->numberOfCredits
     * @param double  $totalCreditsAmount              Initialization value for $this->totalCreditsAmount
     * @param double  $largestCredit                   Initialization value for $this->largestCredit
     * @param string  $numberOfCreditsLessTransfers    Initialization value for $this->numberOfCreditsLessTransfers
     * @param double  $totalCreditsAmountLessTransfers Initialization value for $this-
     *                                                   >totalCreditsAmountLessTransfers
     * @param double  $averageCreditAmount             Initialization value for $this->averageCreditAmount
     * @param string  $estimatedNumberOfLoanDeposits   Initialization value for $this->estimatedNumberOfLoanDeposits
     * @param double  $estimatedLoanDepositAmount      Initialization value for $this->estimatedLoanDepositAmount
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->month                           = func_get_arg(0);
            $this->numberOfCredits                 = func_get_arg(1);
            $this->totalCreditsAmount              = func_get_arg(2);
            $this->largestCredit                   = func_get_arg(3);
            $this->numberOfCreditsLessTransfers    = func_get_arg(4);
            $this->totalCreditsAmountLessTransfers = func_get_arg(5);
            $this->averageCreditAmount             = func_get_arg(6);
            $this->estimatedNumberOfLoanDeposits   = func_get_arg(7);
            $this->estimatedLoanDepositAmount      = func_get_arg(8);
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
        $json['numberOfCredits']                 = $this->numberOfCredits;
        $json['totalCreditsAmount']              = $this->totalCreditsAmount;
        $json['largestCredit']                   = $this->largestCredit;
        $json['numberOfCreditsLessTransfers']    = $this->numberOfCreditsLessTransfers;
        $json['totalCreditsAmountLessTransfers'] = $this->totalCreditsAmountLessTransfers;
        $json['averageCreditAmount']             = $this->averageCreditAmount;
        $json['estimatedNumberOfLoanDeposits']   = $this->estimatedNumberOfLoanDeposits;
        $json['estimatedLoanDepositAmount']      = $this->estimatedLoanDepositAmount;

        return array_merge($json, $this->additionalProperties);
    }
}
