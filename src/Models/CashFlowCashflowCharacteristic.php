<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowCashflowCharacteristic implements JsonSerializable
{
    /**
     * List of attributes for each month
     * @required
     * @var \FinicityAPILib\Models\CashFlowMonthlyCashFlowCharacteristics[] $monthlyCashFlowCharacteristics public property
     */
    public $monthlyCashFlowCharacteristics;

    /**
     * Average (Total Credits - Total Debits) for the account
     * @required
     * @var double $averageMonthlyNet public property
     */
    public $averageMonthlyNet;

    /**
     * Average (Total Credits - Total Debits) without transfers for the account
     * @required
     * @var double $averageMonthlyNetLessTransfers public property
     */
    public $averageMonthlyNetLessTransfers;

    /**
     * Sum of all monthly (Total Credits - Total Debits) each month for the account
     * @required
     * @var double $twelveMonthTotalNet public property
     */
    public $twelveMonthTotalNet;

    /**
     * Sum of all monthly (Total Credits - Total Debits) without transfers for the account
     * @required
     * @var double $twelveMonthTotalNetLessTransfers public property
     */
    public $twelveMonthTotalNetLessTransfers;

    /**
     * 6 Month Average (Total Credits - Total Debits)
     * @required
     * @var double $sixMonthAverageTotalCreditsLessTotalDebits public property
     */
    public $sixMonthAverageTotalCreditsLessTotalDebits;

    /**
     * 6 Month Average (Total Credits - Total Debits) - (Without Transfers)
     * @required
     * @var double $sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers public property
     */
    public $sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers;

    /**
     * 2 Month Average (Total Credits - Total Debits)
     * @required
     * @var double $twoMonthAverageTotalCreditsLessTotalDebits public property
     */
    public $twoMonthAverageTotalCreditsLessTotalDebits;

    /**
     * 2 Month Average (Total Credits - Total Debits) - (Without Transfers)
     * @required
     * @var double $twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers public property
     */
    public $twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array  $monthlyCashFlowCharacteristics                          Initialization value for $this-
     *                                                                          >monthlyCashFlowCharacteristics
     * @param double $averageMonthlyNet                                       Initialization value for $this-
     *                                                                          >averageMonthlyNet
     * @param double $averageMonthlyNetLessTransfers                          Initialization value for $this-
     *                                                                          >averageMonthlyNetLessTransfers
     * @param double $twelveMonthTotalNet                                     Initialization value for $this-
     *                                                                          >twelveMonthTotalNet
     * @param double $twelveMonthTotalNetLessTransfers                        Initialization value for $this-
     *                                                                          >twelveMonthTotalNetLessTransfers
     * @param double $sixMonthAverageTotalCreditsLessTotalDebits              Initialization value for $this-
     *                                                                          >sixMonthAverageTotalCreditsLessTotalDeb
     *                                                                          its
     * @param double $sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers Initialization value for $this-
     *                                                                          >sixMonthAverageTotalCreditsLessTotalDeb
     *                                                                          itsLessTransfers
     * @param double $twoMonthAverageTotalCreditsLessTotalDebits              Initialization value for $this-
     *                                                                          >twoMonthAverageTotalCreditsLessTotalDeb
     *                                                                          its
     * @param double $twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers Initialization value for $this-
     *                                                                          >twoMonthAverageTotalCreditsLessTotalDeb
     *                                                                          itsLessTransfers
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->monthlyCashFlowCharacteristics                          = func_get_arg(0);
            $this->averageMonthlyNet                                       = func_get_arg(1);
            $this->averageMonthlyNetLessTransfers                          = func_get_arg(2);
            $this->twelveMonthTotalNet                                     = func_get_arg(3);
            $this->twelveMonthTotalNetLessTransfers                        = func_get_arg(4);
            $this->sixMonthAverageTotalCreditsLessTotalDebits              = func_get_arg(5);
            $this->sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers = func_get_arg(6);
            $this->twoMonthAverageTotalCreditsLessTotalDebits              = func_get_arg(7);
            $this->twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers = func_get_arg(8);
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
        $json['monthlyCashFlowCharacteristics']                          = $this->monthlyCashFlowCharacteristics;
        $json['averageMonthlyNet']                                       = $this->averageMonthlyNet;
        $json['averageMonthlyNetLessTransfers']                          = $this->averageMonthlyNetLessTransfers;
        $json['twelveMonthTotalNet']                                     = $this->twelveMonthTotalNet;
        $json['twelveMonthTotalNetLessTransfers']                        = $this->twelveMonthTotalNetLessTransfers;
        $json['sixMonthAverageTotalCreditsLessTotalDebits']              = $this->sixMonthAverageTotalCreditsLessTotalDebits;
        $json['sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers'] = $this->sixMonthAverageTotalCreditsLessTotalDebitsLessTransfers;
        $json['twoMonthAverageTotalCreditsLessTotalDebits']              = $this->twoMonthAverageTotalCreditsLessTotalDebits;
        $json['twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers'] = $this->twoMonthAverageTotalCreditsLessTotalDebitsLessTransfers;

        return array_merge($json, $this->additionalProperties);
    }
}
