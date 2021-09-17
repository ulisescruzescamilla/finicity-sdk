<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetAvailableBalanceResponse implements JsonSerializable
{
    /**
     * ID for the customer who owns the account
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The last 4 digits of the ACH account number
     * @required
     * @var integer $realAccountNumberLast4 public property
     */
    public $realAccountNumberLast4;

    /**
     * The available balance of the account
     * @required
     * @var double $availableBalance public property
     */
    public $availableBalance;

    /**
     * Epoch Unix Timestamp for when the available balance was retrieved
     * @required
     * @var integer $availableBalanceDate public property
     */
    public $availableBalanceDate;

    /**
     * The cleared balance of the account. Also referred as posted balance, current balance, ledger
     * balance
     * @required
     * @var double $clearedBalance public property
     */
    public $clearedBalance;

    /**
     * Epoch Unix Timestamp for when the cleared balance was retrieved
     * @required
     * @var integer $clearedBalanceDate public property
     */
    public $clearedBalanceDate;

    /**
     * The status of the most recent aggregation attempt (see Handling Aggregation Status Codes). This will
     * not be present until you have run your first aggregation for the account.
     * @required
     * @var integer $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * The currency of the account
     * @required
     * @var string $currency public property
     */
    public $currency;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                     Initialization value for $this->id
     * @param integer $realAccountNumberLast4 Initialization value for $this->realAccountNumberLast4
     * @param double  $availableBalance       Initialization value for $this->availableBalance
     * @param integer $availableBalanceDate   Initialization value for $this->availableBalanceDate
     * @param double  $clearedBalance         Initialization value for $this->clearedBalance
     * @param integer $clearedBalanceDate     Initialization value for $this->clearedBalanceDate
     * @param integer $aggregationStatusCode  Initialization value for $this->aggregationStatusCode
     * @param string  $currency               Initialization value for $this->currency
     */
    public function __construct()
    {
        if (8 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->realAccountNumberLast4 = func_get_arg(1);
            $this->availableBalance       = func_get_arg(2);
            $this->availableBalanceDate   = func_get_arg(3);
            $this->clearedBalance         = func_get_arg(4);
            $this->clearedBalanceDate     = func_get_arg(5);
            $this->aggregationStatusCode  = func_get_arg(6);
            $this->currency               = func_get_arg(7);
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
        $json['realAccountNumberLast4'] = $this->realAccountNumberLast4;
        $json['availableBalance']       = $this->availableBalance;
        $json['availableBalanceDate']   = $this->availableBalanceDate;
        $json['clearedBalance']         = $this->clearedBalance;
        $json['clearedBalanceDate']     = $this->clearedBalanceDate;
        $json['aggregationStatusCode']  = $this->aggregationStatusCode;
        $json['currency']               = $this->currency;

        return array_merge($json, $this->additionalProperties);
    }
}
