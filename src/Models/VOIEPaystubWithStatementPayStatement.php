<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOIEPaystubWithStatementPayStatement implements JsonSerializable
{
    /**
     * The pay period of the pay statement.
     * @required
     * @var string $payPeriod public property
     */
    public $payPeriod;

    /**
     * This will display true if the pay statement is billable. If a pay statement has been digitized
     * previously, this will display as false as it will not be billable.
     * @required
     * @var bool $billable public property
     */
    public $billable;

    /**
     * The asset ID of the stored pay statement
     * @required
     * @var string $assetId public property
     */
    public $assetId;

    /**
     * The listed pay date for the pay statement.
     * @required
     * @var integer $payDate public property
     */
    public $payDate;

    /**
     * The beginning of the pay period.
     * @required
     * @var integer $startDate public property
     */
    public $startDate;

    /**
     * The end of the pay period.
     * @required
     * @var integer $endDate public property
     */
    public $endDate;

    /**
     * The total pay after deductions for the employee for the current pay period.
     * @required
     * @var double $netPayCurrent public property
     */
    public $netPayCurrent;

    /**
     * The total accumulation of pay after deductions for the employee for the current pay year.
     * @required
     * @var double $netPayYTD public property
     */
    public $netPayYTD;

    /**
     * The total pay before deductions for the employee for the current pay period.
     * @required
     * @var double $grossPayCurrent public property
     */
    public $grossPayCurrent;

    /**
     * The total accumulation of pay before deductions for the employee for the current pay year.
     * @required
     * @var double $grossPayYTD public property
     */
    public $grossPayYTD;

    /**
     * The payroll provider extracted from the pay statement.
     * @var string|null $payrollProvider public property
     */
    public $payrollProvider;

    /**
     * Information pertaining to the employer
     * @required
     * @var \FinicityAPILib\Models\Employer $employer public property
     */
    public $employer;

    /**
     * Information pertaining to the employee
     * @required
     * @var \FinicityAPILib\Models\Employee $employee public property
     */
    public $employee;

    /**
     * Information pertaining to the earnings on the pay statement
     * @required
     * @var \FinicityAPILib\Models\PayStat[] $payStat public property
     */
    public $payStat;

    /**
     * Information pertaining to the direct deposits on the pay statement
     * @required
     * @var \FinicityAPILib\Models\DirectDeposit[] $directDeposits public property
     */
    public $directDeposits;

    /**
     * The Finicity estimated monthly income based on the pay cadence and the earnings categories from the
     * paystub, as available.
     * @required
     * @var \FinicityAPILib\Models\PaystubMonthlyIncomeRecord $monthlyIncome public property
     */
    public $monthlyIncome;

    /**
     * Not populated for the voieWithStatement style of paystub report. For the VOIE - Paystub (with
     * TXVerfiy) reports this would include details of the financial institution accounts and income
     * streams with matching transactions to the pay statement.
     * @required
     * @var array $institutions public property
     */
    public $institutions;

    /**
     * Error code for the asset
     * @var integer|null $errorCode public property
     */
    public $errorCode;

    /**
     * Error message for the asset
     * @var string|null $errorMessage public property
     */
    public $errorMessage;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                     $payPeriod       Initialization value for $this->payPeriod
     * @param bool                       $billable        Initialization value for $this->billable
     * @param string                     $assetId         Initialization value for $this->assetId
     * @param integer                    $payDate         Initialization value for $this->payDate
     * @param integer                    $startDate       Initialization value for $this->startDate
     * @param integer                    $endDate         Initialization value for $this->endDate
     * @param double                     $netPayCurrent   Initialization value for $this->netPayCurrent
     * @param double                     $netPayYTD       Initialization value for $this->netPayYTD
     * @param double                     $grossPayCurrent Initialization value for $this->grossPayCurrent
     * @param double                     $grossPayYTD     Initialization value for $this->grossPayYTD
     * @param string                     $payrollProvider Initialization value for $this->payrollProvider
     * @param Employer                   $employer        Initialization value for $this->employer
     * @param Employee                   $employee        Initialization value for $this->employee
     * @param array                      $payStat         Initialization value for $this->payStat
     * @param array                      $directDeposits  Initialization value for $this->directDeposits
     * @param PaystubMonthlyIncomeRecord $monthlyIncome   Initialization value for $this->monthlyIncome
     * @param array                      $institutions    Initialization value for $this->institutions
     * @param integer                    $errorCode       Initialization value for $this->errorCode
     * @param string                     $errorMessage    Initialization value for $this->errorMessage
     */
    public function __construct()
    {
        if (19 == func_num_args()) {
            $this->payPeriod       = func_get_arg(0);
            $this->billable        = func_get_arg(1);
            $this->assetId         = func_get_arg(2);
            $this->payDate         = func_get_arg(3);
            $this->startDate       = func_get_arg(4);
            $this->endDate         = func_get_arg(5);
            $this->netPayCurrent   = func_get_arg(6);
            $this->netPayYTD       = func_get_arg(7);
            $this->grossPayCurrent = func_get_arg(8);
            $this->grossPayYTD     = func_get_arg(9);
            $this->payrollProvider = func_get_arg(10);
            $this->employer        = func_get_arg(11);
            $this->employee        = func_get_arg(12);
            $this->payStat         = func_get_arg(13);
            $this->directDeposits  = func_get_arg(14);
            $this->monthlyIncome   = func_get_arg(15);
            $this->institutions    = func_get_arg(16);
            $this->errorCode       = func_get_arg(17);
            $this->errorMessage    = func_get_arg(18);
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
        $json['payPeriod']       = $this->payPeriod;
        $json['billable']        = $this->billable;
        $json['assetId']         = $this->assetId;
        $json['payDate']         = $this->payDate;
        $json['startDate']       = $this->startDate;
        $json['endDate']         = $this->endDate;
        $json['netPayCurrent']   = $this->netPayCurrent;
        $json['netPayYTD']       = $this->netPayYTD;
        $json['grossPayCurrent'] = $this->grossPayCurrent;
        $json['grossPayYTD']     = $this->grossPayYTD;
        $json['payrollProvider'] = $this->payrollProvider;
        $json['employer']        = $this->employer;
        $json['employee']        = $this->employee;
        $json['payStat']         = $this->payStat;
        $json['directDeposits']  = $this->directDeposits;
        $json['monthlyIncome']   = $this->monthlyIncome;
        $json['institutions']    = $this->institutions;
        $json['errorCode']       = $this->errorCode;
        $json['errorMessage']    = $this->errorMessage;

        return array_merge($json, $this->additionalProperties);
    }
}
