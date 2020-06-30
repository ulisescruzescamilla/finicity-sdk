<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The loan payment details for the customer account
 */
class LoanPaymentDetails implements JsonSerializable
{
    /**
     * The number of the specific loan under the account.
     * @required
     * @var string $loanNumber public property
     */
    public $loanNumber;

    /**
     * The payment number given by the institution. This number is typically for manual payments. This is
     * not an ACH payment number.
     * @required
     * @var string $loanPaymentNumber public property
     */
    public $loanPaymentNumber;

    /**
     * The payment address to send manual payments to
     * @required
     * @var string $loanPaymentAddress public property
     */
    public $loanPaymentAddress;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $loanNumber         Initialization value for $this->loanNumber
     * @param string $loanPaymentNumber  Initialization value for $this->loanPaymentNumber
     * @param string $loanPaymentAddress Initialization value for $this->loanPaymentAddress
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->loanNumber         = func_get_arg(0);
            $this->loanPaymentNumber  = func_get_arg(1);
            $this->loanPaymentAddress = func_get_arg(2);
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
        $json['loanNumber']         = $this->loanNumber;
        $json['loanPaymentNumber']  = $this->loanPaymentNumber;
        $json['loanPaymentAddress'] = $this->loanPaymentAddress;

        return array_merge($json, $this->additionalProperties);
    }
}
