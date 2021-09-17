<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowMonthlycashflowDebits implements JsonSerializable
{
    /**
     * One instance for each complete calendar month in the report
     * @required
     * @var integer $month public property
     */
    public $month;

    /**
     * Number of Debits by month
     * @required
     * @var string $numberOfDebits public property
     */
    public $numberOfDebits;

    /**
     * Total Amount of Debits by month
     * @required
     * @var double $totalDebitsAmount public property
     */
    public $totalDebitsAmount;

    /**
     * Largest Debit by month
     * @required
     * @var double $largestDebit public property
     */
    public $largestDebit;

    /**
     * Number of Debits by month (less transfers)
     * @required
     * @var string $numberOfDebitsLessTransfers public property
     */
    public $numberOfDebitsLessTransfers;

    /**
     * Total amount of debits by month (less transfers)
     * @required
     * @var double $totalDebitsAmountLessTransfers public property
     */
    public $totalDebitsAmountLessTransfers;

    /**
     * The average debit amount
     * @required
     * @var double $averageDebitAmount public property
     */
    public $averageDebitAmount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $month                          Initialization value for $this->month
     * @param string  $numberOfDebits                 Initialization value for $this->numberOfDebits
     * @param double  $totalDebitsAmount              Initialization value for $this->totalDebitsAmount
     * @param double  $largestDebit                   Initialization value for $this->largestDebit
     * @param string  $numberOfDebitsLessTransfers    Initialization value for $this->numberOfDebitsLessTransfers
     * @param double  $totalDebitsAmountLessTransfers Initialization value for $this->totalDebitsAmountLessTransfers
     * @param double  $averageDebitAmount             Initialization value for $this->averageDebitAmount
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->month                          = func_get_arg(0);
            $this->numberOfDebits                 = func_get_arg(1);
            $this->totalDebitsAmount              = func_get_arg(2);
            $this->largestDebit                   = func_get_arg(3);
            $this->numberOfDebitsLessTransfers    = func_get_arg(4);
            $this->totalDebitsAmountLessTransfers = func_get_arg(5);
            $this->averageDebitAmount             = func_get_arg(6);
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
        $json['month']                          = $this->month;
        $json['numberOfDebits']                 = $this->numberOfDebits;
        $json['totalDebitsAmount']              = $this->totalDebitsAmount;
        $json['largestDebit']                   = $this->largestDebit;
        $json['numberOfDebitsLessTransfers']    = $this->numberOfDebitsLessTransfers;
        $json['totalDebitsAmountLessTransfers'] = $this->totalDebitsAmountLessTransfers;
        $json['averageDebitAmount']             = $this->averageDebitAmount;

        return array_merge($json, $this->additionalProperties);
    }
}
