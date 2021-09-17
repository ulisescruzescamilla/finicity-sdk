<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The fields used for the Transaction History Report (CRA products).
 */
class TransactionsReportAccount implements JsonSerializable
{
    /**
     * The Finicity account ID.
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The account name from the financial institution.
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The account number from the financial institution (obfuscated).
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * All Types: checking, savings, loan, mortgage, credit card, CD, MM, investment, and more.
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the most recent aggregation attempt for this account. Note: non-zero means the account
     * was not accessed successfully for this report, and additional fields for this account may not be
     * reliable.
     * @required
     * @var integer $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * The cleared balance of the account as-of balanceDate.
     * @required
     * @var double $balance public property
     */
    public $balance;

    /**
     * A timestamp showing when the balance was captured.
     * @required
     * @var integer $balanceDate public property
     */
    public $balanceDate;

    /**
     * A list of transactions associated with the account.
     * @required
     * @var \FinicityAPILib\Models\TransactionsReportTransaction[] $transactions public property
     */
    public $transactions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                    Initialization value for $this->id
     * @param string  $name                  Initialization value for $this->name
     * @param string  $number                Initialization value for $this->number
     * @param string  $type                  Initialization value for $this->type
     * @param integer $aggregationStatusCode Initialization value for $this->aggregationStatusCode
     * @param double  $balance               Initialization value for $this->balance
     * @param integer $balanceDate           Initialization value for $this->balanceDate
     * @param array   $transactions          Initialization value for $this->transactions
     */
    public function __construct()
    {
        if (8 == func_num_args()) {
            $this->id                    = func_get_arg(0);
            $this->name                  = func_get_arg(1);
            $this->number                = func_get_arg(2);
            $this->type                  = func_get_arg(3);
            $this->aggregationStatusCode = func_get_arg(4);
            $this->balance               = func_get_arg(5);
            $this->balanceDate           = func_get_arg(6);
            $this->transactions          = func_get_arg(7);
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
        $json['id']                    = $this->id;
        $json['name']                  = $this->name;
        $json['number']                = $this->number;
        $json['type']                  = $this->type;
        $json['aggregationStatusCode'] = $this->aggregationStatusCode;
        $json['balance']               = $this->balance;
        $json['balanceDate']           = $this->balanceDate;
        $json['transactions']          = $this->transactions;

        return array_merge($json, $this->additionalProperties);
    }
}
