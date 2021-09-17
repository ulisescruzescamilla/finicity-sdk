<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOIETxverifyReportAccountForInstitutions implements JsonSerializable
{
    /**
     * The generated FInicity ID of the account
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The name(s) of the account owner(s). This field is optional. If no owner information is available,
     * this field will not appear in the report.
     * @required
     * @var string $ownerName public property
     */
    public $ownerName;

    /**
     * The mailing address of the account owner(s). This field is optional. If no owner information is
     * available, this field will not appear in the report.
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
     * The account number from the institution (all digits except the last four are obfuscated)
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * One of the values from Account Types
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the most recent aggregation attempt (see Handling Aggregation Status Codes)
     * @required
     * @var integer $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * A list of income stream records
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyReportIncomeStream[] $incomeStreams public property
     */
    public $incomeStreams;

    /**
     * The cleared balance of the account as-of balanceDate
     * @required
     * @var double $balance public property
     */
    public $balance;

    /**
     * The average monthly balance of this account
     * @required
     * @var double $averageMonthlyBalance public property
     */
    public $averageMonthlyBalance;

    /**
     * An array of transactions belonging to the account
     * @required
     * @var array $transactions public property
     */
    public $transactions;

    /**
     * The available balance for the account
     * @required
     * @var double $availableBalance public property
     */
    public $availableBalance;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                    Initialization value for $this->id
     * @param string  $ownerName             Initialization value for $this->ownerName
     * @param string  $ownerAddress          Initialization value for $this->ownerAddress
     * @param string  $name                  Initialization value for $this->name
     * @param string  $number                Initialization value for $this->number
     * @param string  $type                  Initialization value for $this->type
     * @param integer $aggregationStatusCode Initialization value for $this->aggregationStatusCode
     * @param array   $incomeStreams         Initialization value for $this->incomeStreams
     * @param double  $balance               Initialization value for $this->balance
     * @param double  $averageMonthlyBalance Initialization value for $this->averageMonthlyBalance
     * @param array   $transactions          Initialization value for $this->transactions
     * @param double  $availableBalance      Initialization value for $this->availableBalance
     */
    public function __construct()
    {
        if (12 == func_num_args()) {
            $this->id                    = func_get_arg(0);
            $this->ownerName             = func_get_arg(1);
            $this->ownerAddress          = func_get_arg(2);
            $this->name                  = func_get_arg(3);
            $this->number                = func_get_arg(4);
            $this->type                  = func_get_arg(5);
            $this->aggregationStatusCode = func_get_arg(6);
            $this->incomeStreams         = func_get_arg(7);
            $this->balance               = func_get_arg(8);
            $this->averageMonthlyBalance = func_get_arg(9);
            $this->transactions          = func_get_arg(10);
            $this->availableBalance      = func_get_arg(11);
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
        $json['ownerName']             = $this->ownerName;
        $json['ownerAddress']          = $this->ownerAddress;
        $json['name']                  = $this->name;
        $json['number']                = $this->number;
        $json['type']                  = $this->type;
        $json['aggregationStatusCode'] = $this->aggregationStatusCode;
        $json['incomeStreams']         = $this->incomeStreams;
        $json['balance']               = $this->balance;
        $json['averageMonthlyBalance'] = $this->averageMonthlyBalance;
        $json['transactions']          = $this->transactions;
        $json['availableBalance']      = $this->availableBalance;

        return array_merge($json, $this->additionalProperties);
    }
}
