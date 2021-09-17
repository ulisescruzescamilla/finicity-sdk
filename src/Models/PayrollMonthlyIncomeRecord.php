<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollMonthlyIncomeRecord implements JsonSerializable
{
    /**
     * The estimated monthly base pay amount for the employment record, as calculated by Finicity.
     * @var double|null $estimatedMonthlyBasePay public property
     */
    public $estimatedMonthlyBasePay;

    /**
     * The estimated monthly overtime pay amount for the employment record, as calculated by Finicity.
     * @var double|null $estimatedMonthlyOvertimePay public property
     */
    public $estimatedMonthlyOvertimePay;

    /**
     * The estimated monthly bonus pay amount for the employment record, as calculated by Finicity.
     * @var double|null $estimatedMonthlyBonusPay public property
     */
    public $estimatedMonthlyBonusPay;

    /**
     * The estimated monthly other pay amount for the employment record, as calculated by Finicity.
     * @var double|null $estimatedMonthlyOtherPay public property
     */
    public $estimatedMonthlyOtherPay;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param double $estimatedMonthlyBasePay     Initialization value for $this->estimatedMonthlyBasePay
     * @param double $estimatedMonthlyOvertimePay Initialization value for $this->estimatedMonthlyOvertimePay
     * @param double $estimatedMonthlyBonusPay    Initialization value for $this->estimatedMonthlyBonusPay
     * @param double $estimatedMonthlyOtherPay    Initialization value for $this->estimatedMonthlyOtherPay
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->estimatedMonthlyBasePay     = func_get_arg(0);
            $this->estimatedMonthlyOvertimePay = func_get_arg(1);
            $this->estimatedMonthlyBonusPay    = func_get_arg(2);
            $this->estimatedMonthlyOtherPay    = func_get_arg(3);
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
        $json['estimatedMonthlyBasePay']     = $this->estimatedMonthlyBasePay;
        $json['estimatedMonthlyOvertimePay'] = $this->estimatedMonthlyOvertimePay;
        $json['estimatedMonthlyBonusPay']    = $this->estimatedMonthlyBonusPay;
        $json['estimatedMonthlyOtherPay']    = $this->estimatedMonthlyOtherPay;

        return array_merge($json, $this->additionalProperties);
    }
}
