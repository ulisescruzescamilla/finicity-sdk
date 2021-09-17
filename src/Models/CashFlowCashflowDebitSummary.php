<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowCashflowDebitSummary implements JsonSerializable
{
    /**
     * List of attributes for each month
     * @required
     * @var \FinicityAPILib\Models\CashFlowMonthlyCashFlowDebitSummaries[] $monthlyCashFlowDebitSummaries public property
     */
    public $monthlyCashFlowDebitSummaries;

    /**
     * Sum of all monthly debit transactions for each month by account
     * @required
     * @var double $twelveMonthDebitTotal public property
     */
    public $twelveMonthDebitTotal;

    /**
     * Sum of all monthly debit transactions without transfers for the account
     * @required
     * @var double $twelveMonthDebitTotalLessTransfers public property
     */
    public $twelveMonthDebitTotalLessTransfers;

    /**
     * Six month sum of all debit transactions by account
     * @required
     * @var double $sixMonthDebitTotal public property
     */
    public $sixMonthDebitTotal;

    /**
     * Six month sum of all debit transactions without transfers for the account
     * @required
     * @var double $sixMonthDebitTotalLessTransfers public property
     */
    public $sixMonthDebitTotalLessTransfers;

    /**
     * Two month sum of all debit transactions by account
     * @required
     * @var double $twoMonthDebitTotal public property
     */
    public $twoMonthDebitTotal;

    /**
     * Two month sum of all debit transactions without transfers for the account
     * @required
     * @var double $twoMonthDebitTotalLessTransfers public property
     */
    public $twoMonthDebitTotalLessTransfers;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array  $monthlyCashFlowDebitSummaries      Initialization value for $this-
     *                                                     >monthlyCashFlowDebitSummaries
     * @param double $twelveMonthDebitTotal              Initialization value for $this->twelveMonthDebitTotal
     * @param double $twelveMonthDebitTotalLessTransfers Initialization value for $this-
     *                                                     >twelveMonthDebitTotalLessTransfers
     * @param double $sixMonthDebitTotal                 Initialization value for $this->sixMonthDebitTotal
     * @param double $sixMonthDebitTotalLessTransfers    Initialization value for $this-
     *                                                     >sixMonthDebitTotalLessTransfers
     * @param double $twoMonthDebitTotal                 Initialization value for $this->twoMonthDebitTotal
     * @param double $twoMonthDebitTotalLessTransfers    Initialization value for $this-
     *                                                     >twoMonthDebitTotalLessTransfers
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->monthlyCashFlowDebitSummaries      = func_get_arg(0);
            $this->twelveMonthDebitTotal              = func_get_arg(1);
            $this->twelveMonthDebitTotalLessTransfers = func_get_arg(2);
            $this->sixMonthDebitTotal                 = func_get_arg(3);
            $this->sixMonthDebitTotalLessTransfers    = func_get_arg(4);
            $this->twoMonthDebitTotal                 = func_get_arg(5);
            $this->twoMonthDebitTotalLessTransfers    = func_get_arg(6);
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
        $json['monthlyCashFlowDebitSummaries']      = $this->monthlyCashFlowDebitSummaries;
        $json['twelveMonthDebitTotal']              = $this->twelveMonthDebitTotal;
        $json['twelveMonthDebitTotalLessTransfers'] = $this->twelveMonthDebitTotalLessTransfers;
        $json['sixMonthDebitTotal']                 = $this->sixMonthDebitTotal;
        $json['sixMonthDebitTotalLessTransfers']    = $this->sixMonthDebitTotalLessTransfers;
        $json['twoMonthDebitTotal']                 = $this->twoMonthDebitTotal;
        $json['twoMonthDebitTotalLessTransfers']    = $this->twoMonthDebitTotalLessTransfers;

        return array_merge($json, $this->additionalProperties);
    }
}
