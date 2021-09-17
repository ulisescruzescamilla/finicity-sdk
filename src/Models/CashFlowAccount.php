<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowAccount implements JsonSerializable
{
    /**
     * Finicity account ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * The name(s) of the account owner(s), retrieved from the institution.
     * @required
     * @var string $ownerName public property
     */
    public $ownerName;

    /**
     * The mailing address of the account owner, retrieved from the institution.
     * @required
     * @var string $ownerAddress public property
     */
    public $ownerAddress;

    /**
     * The account name from the institution
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The account number from the institution (obfuscated)
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * CFR: `ALL` (`checking` / `savings` / `loan` / `mortgage` / `credit card` / `CD` / `MM` /
     * `investment`…)
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the most recent aggregation attempt for this account (non-zero means the account was
     * not accessed successfully for this report, and additional fields for this account may not be
     * reliable)
     * @required
     * @var string $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * The cleared balance of the account as-of `balanceDate`
     * @required
     * @var double $currentBalance public property
     */
    public $currentBalance;

    /**
     * Available balance
     * @required
     * @var double $availableBalance public property
     */
    public $availableBalance;

    /**
     * A timestamp showing when the `balance` was captured
     * @required
     * @var integer $balanceDate public property
     */
    public $balanceDate;

    /**
     * a `transactions` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowTransactions[] $transactions public property
     */
    public $transactions;

    /**
     * A `cashFlowBalance` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashflowBalance $cashFlowBalance public property
     */
    public $cashFlowBalance;

    /**
     * A `cashFlowCredit` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashFlowCredit $cashFlowCredit public property
     */
    public $cashFlowCredit;

    /**
     * A `cashFlowDebit` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashflowDebit $cashFlowDebit public property
     */
    public $cashFlowDebit;

    /**
     * A `cashFlowCharacteristic` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashflowCharacteristic $cashFlowCharacteristic public property
     */
    public $cashFlowCharacteristic;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                         $id                     Initialization value for $this->id
     * @param string                         $ownerName              Initialization value for $this->ownerName
     * @param string                         $ownerAddress           Initialization value for $this->ownerAddress
     * @param string                         $name                   Initialization value for $this->name
     * @param string                         $number                 Initialization value for $this->number
     * @param string                         $type                   Initialization value for $this->type
     * @param string                         $aggregationStatusCode  Initialization value for $this-
     *                                                                 >aggregationStatusCode
     * @param double                         $currentBalance         Initialization value for $this->currentBalance
     * @param double                         $availableBalance       Initialization value for $this->availableBalance
     * @param integer                        $balanceDate            Initialization value for $this->balanceDate
     * @param array                          $transactions           Initialization value for $this->transactions
     * @param CashFlowCashflowBalance        $cashFlowBalance        Initialization value for $this->cashFlowBalance
     * @param CashFlowCashFlowCredit         $cashFlowCredit         Initialization value for $this->cashFlowCredit
     * @param CashFlowCashflowDebit          $cashFlowDebit          Initialization value for $this->cashFlowDebit
     * @param CashFlowCashflowCharacteristic $cashFlowCharacteristic Initialization value for $this-
     *                                                                 >cashFlowCharacteristic
     */
    public function __construct()
    {
        if (15 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->ownerName              = func_get_arg(1);
            $this->ownerAddress           = func_get_arg(2);
            $this->name                   = func_get_arg(3);
            $this->number                 = func_get_arg(4);
            $this->type                   = func_get_arg(5);
            $this->aggregationStatusCode  = func_get_arg(6);
            $this->currentBalance         = func_get_arg(7);
            $this->availableBalance       = func_get_arg(8);
            $this->balanceDate            = func_get_arg(9);
            $this->transactions           = func_get_arg(10);
            $this->cashFlowBalance        = func_get_arg(11);
            $this->cashFlowCredit         = func_get_arg(12);
            $this->cashFlowDebit          = func_get_arg(13);
            $this->cashFlowCharacteristic = func_get_arg(14);
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
        $json['id']                     = $this->id;
        $json['ownerName']              = $this->ownerName;
        $json['ownerAddress']           = $this->ownerAddress;
        $json['name']                   = $this->name;
        $json['number']                 = $this->number;
        $json['type']                   = $this->type;
        $json['aggregationStatusCode']  = $this->aggregationStatusCode;
        $json['currentBalance']         = $this->currentBalance;
        $json['availableBalance']       = $this->availableBalance;
        $json['balanceDate']            = $this->balanceDate;
        $json['transactions']           = $this->transactions;
        $json['cashFlowBalance']        = $this->cashFlowBalance;
        $json['cashFlowCredit']         = $this->cashFlowCredit;
        $json['cashFlowDebit']          = $this->cashFlowDebit;
        $json['cashFlowCharacteristic'] = $this->cashFlowCharacteristic;

        return array_merge($json, $this->additionalProperties);
    }
}
