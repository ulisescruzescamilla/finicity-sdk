<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PrequalificationReportAccount implements JsonSerializable
{
    /**
     * The generated FInicity ID of the account
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The account number from the institution (all digits except the last four are obfuscated)
     * @required
     * @var string $number public property
     */
    public $number;

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
     * One of the values from Account Types
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The available balance for the account
     * @required
     * @var double $availableBalance public property
     */
    public $availableBalance;

    /**
     * The status of the most recent aggregation attempt (see Handling Aggregation Status Codes)
     * @required
     * @var integer $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * The cleared balance of the account as-of balanceDate
     * @required
     * @var double $balance public property
     */
    public $balance;

    /**
     * A timestamp showing when the balance was captured (see Handling Dates and Times)
     * @required
     * @var integer $balanceDate public property
     */
    public $balanceDate;

    /**
     * The average monthly balance of this account
     * @required
     * @var double $averageMonthlyBalance public property
     */
    public $averageMonthlyBalance;

    /**
     * An asset record for the account
     * @required
     * @var \FinicityAPILib\Models\AssetSummary $asset public property
     */
    public $asset;

    /**
     * A details record for the account
     * @required
     * @var \FinicityAPILib\Models\AccountDetail $details public property
     */
    public $details;

    /**
     * The total number of days since the most recent insufficient funds fee for the account
     * @required
     * @var integer $totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount public property
     */
    public $totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount;

    /**
     * The total number of  insufficient funds fees for the account over six months
     * @required
     * @var integer $totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount public property
     */
    public $totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer       $id                                                             Initialization value for $this-
     *                                                                                        >id
     * @param string        $number                                                         Initialization value for $this-
     *                                                                                        >number
     * @param string        $ownerName                                                      Initialization value for $this-
     *                                                                                        >ownerName
     * @param string        $ownerAddress                                                   Initialization value for $this-
     *                                                                                        >ownerAddress
     * @param string        $name                                                           Initialization value for $this-
     *                                                                                        >name
     * @param string        $type                                                           Initialization value for $this-
     *                                                                                        >type
     * @param double        $availableBalance                                               Initialization value for $this-
     *                                                                                        >availableBalance
     * @param integer       $aggregationStatusCode                                          Initialization value for $this-
     *                                                                                        >aggregationStatusCode
     * @param double        $balance                                                        Initialization value for $this-
     *                                                                                        >balance
     * @param integer       $balanceDate                                                    Initialization value for $this-
     *                                                                                        >balanceDate
     * @param double        $averageMonthlyBalance                                          Initialization value for $this-
     *                                                                                        >averageMonthlyBalance
     * @param AssetSummary  $asset                                                          Initialization value for $this-
     *                                                                                        >asset
     * @param AccountDetail $details                                                        Initialization value for $this-
     *                                                                                        >details
     * @param integer       $totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount Initialization value for $this-
     *                                                                                        >totNumberDaysSinceMostRecentI
     *                                                                                        nsufficientFundsFeeDebitTxAcco
     *                                                                                        unt
     * @param integer       $totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount         Initialization value for $this-
     *                                                                                        >totNumberInsufficientFundsFee
     *                                                                                        DebitTxOver6MonthsAccount
     */
    public function __construct()
    {
        if (15 == func_num_args()) {
            $this->id                                                             = func_get_arg(0);
            $this->number                                                         = func_get_arg(1);
            $this->ownerName                                                      = func_get_arg(2);
            $this->ownerAddress                                                   = func_get_arg(3);
            $this->name                                                           = func_get_arg(4);
            $this->type                                                           = func_get_arg(5);
            $this->availableBalance                                               = func_get_arg(6);
            $this->aggregationStatusCode                                          = func_get_arg(7);
            $this->balance                                                        = func_get_arg(8);
            $this->balanceDate                                                    = func_get_arg(9);
            $this->averageMonthlyBalance                                          = func_get_arg(10);
            $this->asset                                                          = func_get_arg(11);
            $this->details                                                        = func_get_arg(12);
            $this->totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount = func_get_arg(13);
            $this->totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount         = func_get_arg(14);
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
        $json['id']                                                             = $this->id;
        $json['number']                                                         = $this->number;
        $json['ownerName']                                                      = $this->ownerName;
        $json['ownerAddress']                                                   = $this->ownerAddress;
        $json['name']                                                           = $this->name;
        $json['type']                                                           = $this->type;
        $json['availableBalance']                                               = $this->availableBalance;
        $json['aggregationStatusCode']                                          = $this->aggregationStatusCode;
        $json['balance']                                                        = $this->balance;
        $json['balanceDate']                                                    = $this->balanceDate;
        $json['averageMonthlyBalance']                                          = $this->averageMonthlyBalance;
        $json['asset']                                                          = $this->asset;
        $json['details']                                                        = $this->details;
        $json['totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount'] = $this->totNumberDaysSinceMostRecentInsufficientFundsFeeDebitTxAccount;
        $json['totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount']         = $this->totNumberInsufficientFundsFeeDebitTxOver6MonthsAccount;

        return array_merge($json, $this->additionalProperties);
    }
}
