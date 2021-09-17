<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowMonthlyCashFlowCharacteristicSummaries implements JsonSerializable
{
    /**
     * One instance for each complete calendar month in the report
     * @required
     * @var integer $month public property
     */
    public $month;

    /**
     * Total Credits - Total Debits by month across all accounts
     * @required
     * @var double $totalCreditsLessTotalDebits public property
     */
    public $totalCreditsLessTotalDebits;

    /**
     * Total Credits - Total Debits by month (Without Transfers) across all accounts
     * @required
     * @var double $totalCreditsLessTotalDebitsLessTransfers public property
     */
    public $totalCreditsLessTotalDebitsLessTransfers;

    /**
     * Average transaction amount across all accounts
     * @required
     * @var double $averageTransactionAmount public property
     */
    public $averageTransactionAmount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $month                                    Initialization value for $this->month
     * @param double  $totalCreditsLessTotalDebits              Initialization value for $this-
     *                                                            >totalCreditsLessTotalDebits
     * @param double  $totalCreditsLessTotalDebitsLessTransfers Initialization value for $this-
     *                                                            >totalCreditsLessTotalDebitsLessTransfers
     * @param double  $averageTransactionAmount                 Initialization value for $this-
     *                                                            >averageTransactionAmount
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->month                                    = func_get_arg(0);
            $this->totalCreditsLessTotalDebits              = func_get_arg(1);
            $this->totalCreditsLessTotalDebitsLessTransfers = func_get_arg(2);
            $this->averageTransactionAmount                 = func_get_arg(3);
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
        $json['month']                                    = $this->month;
        $json['totalCreditsLessTotalDebits']              = $this->totalCreditsLessTotalDebits;
        $json['totalCreditsLessTotalDebitsLessTransfers'] = $this->totalCreditsLessTotalDebitsLessTransfers;
        $json['averageTransactionAmount']                 = $this->averageTransactionAmount;

        return array_merge($json, $this->additionalProperties);
    }
}
