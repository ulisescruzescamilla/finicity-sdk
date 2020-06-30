<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *A customer account represents a bank account such as a checking or savings that the customer has
 * added via the Connect interface
 */
class CustomerAccount implements JsonSerializable
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
     * The account name from the institution
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The cleared balance of the account as-of balanceDate
     * @required
     * @var double $balance public property
     */
    public $balance;

    /**
     * One of the values from Account Types
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the most recent aggregation attempt (see Handling Aggregation Status Codes). This will
     * not be present until you have run your first aggregation for the account.
     * @var integer|null $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * pending during account discovery, always active following successful account activation
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The Finicity ID of the customer associated with this account
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * The Finicity ID of the institution for this account
     * @required
     * @var integer $institutionId public property
     */
    public $institutionId;

    /**
     * A timestamp showing when the balance was captured (see Handling Dates and Times)
     * @required
     * @var integer $balanceDate public property
     */
    public $balanceDate;

    /**
     * A timestamp showing the last successful aggregation of the account (see Handling Dates and Times).
     * This will not be present until you have run your first aggregation for the account.
     * @var integer|null $aggregationSuccessDate public property
     */
    public $aggregationSuccessDate;

    /**
     * A timestamp showing the last aggregation attempt, whether successful or not (see Handling Dates and
     * Times). This will not be present until you have run your first aggregation for the account.
     * @var integer|null $aggregationAttemptDate public property
     */
    public $aggregationAttemptDate;

    /**
     * A timestamp showing when the account was added to the Finicity system (see Handling Dates and
     * Times)
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * The currency of the account
     * @required
     * @var string $currency public property
     */
    public $currency;

    /**
     * The date of the latest transaction on the account (see Handling Dates and Times). This will not be
     * present until you have run your first aggregation for the account.
     * @var integer|null $lastTransactionDate public property
     */
    public $lastTransactionDate;

    /**
     * The institution login ID (see Institution Logins)
     * @required
     * @var integer $institutionLoginId public property
     */
    public $institutionLoginId;

    /**
     * Additional Account Details
     * @var \FinicityAPILib\Models\CustomerAccountDetail|null $detail public property
     */
    public $detail;

    /**
     * Investment holdings
     * @var \FinicityAPILib\Models\CustomerAccountPosition[]|null $position public property
     */
    public $position;

    /**
     * Display position of the account at the financial institution 1 being the top listed account
     * @required
     * @var integer $displayPosition public property
     */
    public $displayPosition;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer               $id                     Initialization value for $this->id
     * @param string                $number                 Initialization value for $this->number
     * @param string                $name                   Initialization value for $this->name
     * @param double                $balance                Initialization value for $this->balance
     * @param string                $type                   Initialization value for $this->type
     * @param integer               $aggregationStatusCode  Initialization value for $this->aggregationStatusCode
     * @param string                $status                 Initialization value for $this->status
     * @param integer               $customerId             Initialization value for $this->customerId
     * @param integer               $institutionId          Initialization value for $this->institutionId
     * @param integer               $balanceDate            Initialization value for $this->balanceDate
     * @param integer               $aggregationSuccessDate Initialization value for $this->aggregationSuccessDate
     * @param integer               $aggregationAttemptDate Initialization value for $this->aggregationAttemptDate
     * @param integer               $createdDate            Initialization value for $this->createdDate
     * @param string                $currency               Initialization value for $this->currency
     * @param integer               $lastTransactionDate    Initialization value for $this->lastTransactionDate
     * @param integer               $institutionLoginId     Initialization value for $this->institutionLoginId
     * @param CustomerAccountDetail $detail                 Initialization value for $this->detail
     * @param array                 $position               Initialization value for $this->position
     * @param integer               $displayPosition        Initialization value for $this->displayPosition
     */
    public function __construct()
    {
        if (19 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->number                 = func_get_arg(1);
            $this->name                   = func_get_arg(2);
            $this->balance                = func_get_arg(3);
            $this->type                   = func_get_arg(4);
            $this->aggregationStatusCode  = func_get_arg(5);
            $this->status                 = func_get_arg(6);
            $this->customerId             = func_get_arg(7);
            $this->institutionId          = func_get_arg(8);
            $this->balanceDate            = func_get_arg(9);
            $this->aggregationSuccessDate = func_get_arg(10);
            $this->aggregationAttemptDate = func_get_arg(11);
            $this->createdDate            = func_get_arg(12);
            $this->currency               = func_get_arg(13);
            $this->lastTransactionDate    = func_get_arg(14);
            $this->institutionLoginId     = func_get_arg(15);
            $this->detail                 = func_get_arg(16);
            $this->position               = func_get_arg(17);
            $this->displayPosition        = func_get_arg(18);
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
        $json['number']                 = $this->number;
        $json['name']                   = $this->name;
        $json['balance']                = $this->balance;
        $json['type']                   = $this->type;
        $json['aggregationStatusCode']  = $this->aggregationStatusCode;
        $json['status']                 = $this->status;
        $json['customerId']             = $this->customerId;
        $json['institutionId']          = $this->institutionId;
        $json['balanceDate']            = $this->balanceDate;
        $json['aggregationSuccessDate'] = $this->aggregationSuccessDate;
        $json['aggregationAttemptDate'] = $this->aggregationAttemptDate;
        $json['createdDate']            = $this->createdDate;
        $json['currency']               = $this->currency;
        $json['lastTransactionDate']    = $this->lastTransactionDate;
        $json['institutionLoginId']     = $this->institutionLoginId;
        $json['detail']                 = $this->detail;
        $json['position']               = $this->position;
        $json['displayPosition']        = $this->displayPosition;

        return array_merge($json, $this->additionalProperties);
    }
}
