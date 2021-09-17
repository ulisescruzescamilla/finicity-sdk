<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowCashFlowCredit implements JsonSerializable
{
    /**
     * List of attributes for each month
     * @required
     * @var \FinicityAPILib\Models\CashFlowMonthlyCashFlowCredits[] $monthlyCashFlowCredits public property
     */
    public $monthlyCashFlowCredits;

    /**
     * Sum of all credit transactions for each month by account
     * @required
     * @var double $twelveMonthCreditTotal public property
     */
    public $twelveMonthCreditTotal;

    /**
     * Sum of all monthly credit transactions without transfers for the account
     * @required
     * @var double $twelveMonthCreditTotalLessTransfers public property
     */
    public $twelveMonthCreditTotalLessTransfers;

    /**
     * Sum of six month credit transactions
     * @required
     * @var double $sixMonthCreditTotal public property
     */
    public $sixMonthCreditTotal;

    /**
     * Sum of six month credit transactions without transfers
     * @required
     * @var double $sixMonthCreditTotalLessTransfers public property
     */
    public $sixMonthCreditTotalLessTransfers;

    /**
     * Sum of two month credit transactions
     * @required
     * @var double $twoMonthCreditTotal public property
     */
    public $twoMonthCreditTotal;

    /**
     * Sum of two month credit transactions without transfers
     * @required
     * @var double $twoMonthCreditTotalLessTransfers public property
     */
    public $twoMonthCreditTotalLessTransfers;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array  $monthlyCashFlowCredits              Initialization value for $this->monthlyCashFlowCredits
     * @param double $twelveMonthCreditTotal              Initialization value for $this->twelveMonthCreditTotal
     * @param double $twelveMonthCreditTotalLessTransfers Initialization value for $this-
     *                                                      >twelveMonthCreditTotalLessTransfers
     * @param double $sixMonthCreditTotal                 Initialization value for $this->sixMonthCreditTotal
     * @param double $sixMonthCreditTotalLessTransfers    Initialization value for $this-
     *                                                      >sixMonthCreditTotalLessTransfers
     * @param double $twoMonthCreditTotal                 Initialization value for $this->twoMonthCreditTotal
     * @param double $twoMonthCreditTotalLessTransfers    Initialization value for $this-
     *                                                      >twoMonthCreditTotalLessTransfers
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->monthlyCashFlowCredits              = func_get_arg(0);
            $this->twelveMonthCreditTotal              = func_get_arg(1);
            $this->twelveMonthCreditTotalLessTransfers = func_get_arg(2);
            $this->sixMonthCreditTotal                 = func_get_arg(3);
            $this->sixMonthCreditTotalLessTransfers    = func_get_arg(4);
            $this->twoMonthCreditTotal                 = func_get_arg(5);
            $this->twoMonthCreditTotalLessTransfers    = func_get_arg(6);
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
        $json['monthlyCashFlowCredits']              = $this->monthlyCashFlowCredits;
        $json['twelveMonthCreditTotal']              = $this->twelveMonthCreditTotal;
        $json['twelveMonthCreditTotalLessTransfers'] = $this->twelveMonthCreditTotalLessTransfers;
        $json['sixMonthCreditTotal']                 = $this->sixMonthCreditTotal;
        $json['sixMonthCreditTotalLessTransfers']    = $this->sixMonthCreditTotalLessTransfers;
        $json['twoMonthCreditTotal']                 = $this->twoMonthCreditTotal;
        $json['twoMonthCreditTotalLessTransfers']    = $this->twoMonthCreditTotalLessTransfers;

        return array_merge($json, $this->additionalProperties);
    }
}
