<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollIncomeRecord implements JsonSerializable
{
    /**
     * The current pay frequency: <br> * `Daily` <br> * `Weekly` <br> * `Bi-Weekly` <br> * `Bi-Weekly Odd`
     * (Bi-Weekly pay on odd weeks) <br> * `Bi-Weekly Even` (Bi-Weekly pay on even weeks) <br> * `Semi-
     * Monthly` <br> * `Monthly` <br> * `Quarterly` <br>* `Semi-Annual` <br> * `Annual` <br>  * `Every 2.6
     * wks` <br> * `Every 4 wks` <br> * `Every 5.2 wks`
     * @required
     * @var string $payFrequency public property
     */
    public $payFrequency;

    /**
     * The current pay type. Options are `Salary`, `Hourly`, or `Daily`.
     * @var string|null $payType public property
     */
    public $payType;

    /**
     * The current regular pay rate from the payroll provider.
     * @required
     * @var double $basePayRate public property
     */
    public $basePayRate;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollAnnualIncomeRecord[] $annualIncome public property
     */
    public $annualIncome;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollMonthlyIncomeRecord $monthlyIncome public property
     */
    public $monthlyIncome;

    /**
     * An array of direct payments from an employer
     * @required
     * @var \FinicityAPILib\Models\DirectPayStatementFields[] $directPayStatements public property
     */
    public $directPayStatements;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                     $payFrequency        Initialization value for $this->payFrequency
     * @param string                     $payType             Initialization value for $this->payType
     * @param double                     $basePayRate         Initialization value for $this->basePayRate
     * @param array                      $annualIncome        Initialization value for $this->annualIncome
     * @param PayrollMonthlyIncomeRecord $monthlyIncome       Initialization value for $this->monthlyIncome
     * @param array                      $directPayStatements Initialization value for $this->directPayStatements
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->payFrequency        = func_get_arg(0);
            $this->payType             = func_get_arg(1);
            $this->basePayRate         = func_get_arg(2);
            $this->annualIncome        = func_get_arg(3);
            $this->monthlyIncome       = func_get_arg(4);
            $this->directPayStatements = func_get_arg(5);
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
        $json['payFrequency']        = $this->payFrequency;
        $json['payType']             = $this->payType;
        $json['basePayRate']         = $this->basePayRate;
        $json['annualIncome']        = $this->annualIncome;
        $json['monthlyIncome']       = $this->monthlyIncome;
        $json['directPayStatements'] = $this->directPayStatements;

        return array_merge($json, $this->additionalProperties);
    }
}
