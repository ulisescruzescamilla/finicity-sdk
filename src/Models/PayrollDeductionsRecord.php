<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollDeductionsRecord implements JsonSerializable
{
    /**
     * The name of the deduction as described by the payroll provider, if available. Note: Today the
     * response provides the deductions summed into the defined deduction types. In the future we may be
     * able to provide the full deduction breakdown, at which point this field would be used to pass the
     * deduction name as would be displayed on the employee's paystub.
     * @var string|null $name public property
     */
    public $name;

    /**
     * Deduction name types: <br> * `Federal tax`: Federal tax withholdings <br> * `State tax`: State tax
     * withholdings <br> * `Local tax`: Local tax withholdings <br> * `Social security tax`: Social
     * security tax withholdings <br> * `Medicare tax`: Medicare tax withholdings <br> * `SUI SDI VPDI tax`:
     * SUI SDI VPDI tax <br> * `Retirement deductions`: Retirement withholdings <br> * `Benefit
     * deductions`: Medical/Health benefits withholdings (i.e. medical, dental, vision insurance) <br> *
     * `Garnishment deductions`: Garnishment withholdings, (i.e. bankruptcy, student loan, state
     * garnishments, tax levy garnishments, child support) <br> * `Other deductions`: Other withholdings,
     * Includes any other and uncommon withholdings, pension plan, stock plans, etc.
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The amount associated with each deduction
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * The YTD total amount for each deduction (if available).
     * @var double|null $amountYTD public property
     */
    public $amountYTD;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name      Initialization value for $this->name
     * @param string $type      Initialization value for $this->type
     * @param double $amount    Initialization value for $this->amount
     * @param double $amountYTD Initialization value for $this->amountYTD
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->name      = func_get_arg(0);
            $this->type      = func_get_arg(1);
            $this->amount    = func_get_arg(2);
            $this->amountYTD = func_get_arg(3);
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
        $json['name']      = $this->name;
        $json['type']      = $this->type;
        $json['amount']    = $this->amount;
        $json['amountYTD'] = $this->amountYTD;

        return array_merge($json, $this->additionalProperties);
    }
}
