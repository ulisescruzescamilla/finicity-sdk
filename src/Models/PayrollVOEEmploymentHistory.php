<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollVOEEmploymentHistory implements JsonSerializable
{
    /**
     * The last time the payroll data was updated in the payroll provider's system
     * @required
     * @var integer $asOfDate public property
     */
    public $asOfDate;

    /**
     * Name of the employer as stated by the employer in the payroll system.
     * @required
     * @var string $employerName public property
     */
    public $employerName;

    /**
     * The name of the payroll source where the data was retrieved.
     * @required
     * @var string $payrollSource public property
     */
    public $payrollSource;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollEmployeeRecord $employee public property
     */
    public $employee;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollEmploymentRecord $employment public property
     */
    public $employment;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollVOEIncomeRecord $income public property
     */
    public $income;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer                 $asOfDate      Initialization value for $this->asOfDate
     * @param string                  $employerName  Initialization value for $this->employerName
     * @param string                  $payrollSource Initialization value for $this->payrollSource
     * @param PayrollEmployeeRecord   $employee      Initialization value for $this->employee
     * @param PayrollEmploymentRecord $employment    Initialization value for $this->employment
     * @param PayrollVOEIncomeRecord  $income        Initialization value for $this->income
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->asOfDate      = func_get_arg(0);
            $this->employerName  = func_get_arg(1);
            $this->payrollSource = func_get_arg(2);
            $this->employee      = func_get_arg(3);
            $this->employment    = func_get_arg(4);
            $this->income        = func_get_arg(5);
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
        $json['asOfDate']      = $this->asOfDate;
        $json['employerName']  = $this->employerName;
        $json['payrollSource'] = $this->payrollSource;
        $json['employee']      = $this->employee;
        $json['employment']    = $this->employment;
        $json['income']        = $this->income;

        return array_merge($json, $this->additionalProperties);
    }
}
