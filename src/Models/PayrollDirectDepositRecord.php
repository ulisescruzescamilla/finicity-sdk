<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollDirectDepositRecord implements JsonSerializable
{
    /**
     * Bank account type: <br> * `Checking` <br> * `Savings` <br> * `Loan`:  Loan account employee chooses
     * to direct a portion of their net pay to help pay off a loan
     * @var string|null $accountTypeCode public property
     */
    public $accountTypeCode;

    /**
     * Direct deposit amount
     * @var double|null $amount public property
     */
    public $amount;

    /**
     * Last four digits of the deposit account number
     * @var string|null $accountLastFour public property
     */
    public $accountLastFour;

    /**
     * Routing number for the deposit account
     * @var string|null $routingNumber public property
     */
    public $routingNumber;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $accountTypeCode Initialization value for $this->accountTypeCode
     * @param double $amount          Initialization value for $this->amount
     * @param string $accountLastFour Initialization value for $this->accountLastFour
     * @param string $routingNumber   Initialization value for $this->routingNumber
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->accountTypeCode = func_get_arg(0);
            $this->amount          = func_get_arg(1);
            $this->accountLastFour = func_get_arg(2);
            $this->routingNumber   = func_get_arg(3);
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
        $json['accountTypeCode'] = $this->accountTypeCode;
        $json['amount']          = $this->amount;
        $json['accountLastFour'] = $this->accountLastFour;
        $json['routingNumber']   = $this->routingNumber;

        return array_merge($json, $this->additionalProperties);
    }
}
