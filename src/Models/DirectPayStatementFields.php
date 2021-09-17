<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class DirectPayStatementFields implements JsonSerializable
{
    /**
     * An id for the income and employment details from a pay period.
     * @required
     * @var string $payrollPayHistoryId public property
     */
    public $payrollPayHistoryId;

    /**
     * The payment history from the last pay period of the year. If there are 3 years of pay history, then
     * the value is true for 3 payment histories.
     * @required
     * @var bool $lastPayPeriodIndicator public property
     */
    public $lastPayPeriodIndicator;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollMainPaystatementFields $mainPayStatementFields public property
     */
    public $mainPayStatementFields;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollEarningsRecord[] $earnings public property
     */
    public $earnings;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollDeductionsRecord[] $deductions public property
     */
    public $deductions;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollDirectDepositRecord[] $directDeposits public property
     */
    public $directDeposits;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                        $payrollPayHistoryId    Initialization value for $this-
     *                                                                >payrollPayHistoryId
     * @param bool                          $lastPayPeriodIndicator Initialization value for $this-
     *                                                                >lastPayPeriodIndicator
     * @param PayrollMainPaystatementFields $mainPayStatementFields Initialization value for $this-
     *                                                                >mainPayStatementFields
     * @param array                         $earnings               Initialization value for $this->earnings
     * @param array                         $deductions             Initialization value for $this->deductions
     * @param array                         $directDeposits         Initialization value for $this->directDeposits
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->payrollPayHistoryId    = func_get_arg(0);
            $this->lastPayPeriodIndicator = func_get_arg(1);
            $this->mainPayStatementFields = func_get_arg(2);
            $this->earnings               = func_get_arg(3);
            $this->deductions             = func_get_arg(4);
            $this->directDeposits         = func_get_arg(5);
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
        $json['payrollPayHistoryId']    = $this->payrollPayHistoryId;
        $json['lastPayPeriodIndicator'] = $this->lastPayPeriodIndicator;
        $json['mainPayStatementFields'] = $this->mainPayStatementFields;
        $json['earnings']               = $this->earnings;
        $json['deductions']             = $this->deductions;
        $json['directDeposits']         = $this->directDeposits;

        return array_merge($json, $this->additionalProperties);
    }
}
