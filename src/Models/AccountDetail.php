<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AccountDetail implements JsonSerializable
{
    /**
     * Only available for investment accounts. Net interest earned after deducting interest paid out
     * @required
     * @var double $interestMarginBalance public property
     */
    public $interestMarginBalance;

    /**
     * Only available for investment accounts. Amount available for cash withdrawal
     * @required
     * @var double $availableCashBalance public property
     */
    public $availableCashBalance;

    /**
     * Only available for investment accounts. Vested amount in account
     * @required
     * @var double $vestedBalance public property
     */
    public $vestedBalance;

    /**
     * Only available for investment accounts. Current loan balance
     * @required
     * @var double $currentLoanBalance public property
     */
    public $currentLoanBalance;

    /**
     * The available balance for the account
     * @required
     * @var double $availableBalanceAmount public property
     */
    public $availableBalanceAmount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param double $interestMarginBalance  Initialization value for $this->interestMarginBalance
     * @param double $availableCashBalance   Initialization value for $this->availableCashBalance
     * @param double $vestedBalance          Initialization value for $this->vestedBalance
     * @param double $currentLoanBalance     Initialization value for $this->currentLoanBalance
     * @param double $availableBalanceAmount Initialization value for $this->availableBalanceAmount
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->interestMarginBalance  = func_get_arg(0);
            $this->availableCashBalance   = func_get_arg(1);
            $this->vestedBalance          = func_get_arg(2);
            $this->currentLoanBalance     = func_get_arg(3);
            $this->availableBalanceAmount = func_get_arg(4);
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
        $json['interestMarginBalance']  = $this->interestMarginBalance;
        $json['availableCashBalance']   = $this->availableCashBalance;
        $json['vestedBalance']          = $this->vestedBalance;
        $json['currentLoanBalance']     = $this->currentLoanBalance;
        $json['availableBalanceAmount'] = $this->availableBalanceAmount;

        return array_merge($json, $this->additionalProperties);
    }
}
