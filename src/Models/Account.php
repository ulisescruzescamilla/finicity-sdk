<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Account implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var double $balance public property
     */
    public $balance;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @var integer|null $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $customerId public property
     */
    public $customerId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $institutionId public property
     */
    public $institutionId;

    /**
     * @todo Write general description for this property
     * @var integer|null $balanceDate public property
     */
    public $balanceDate;

    /**
     * @todo Write general description for this property
     * @var integer|null $aggregationSuccessDate public property
     */
    public $aggregationSuccessDate;

    /**
     * @todo Write general description for this property
     * @var integer|null $aggregationAttemptDate public property
     */
    public $aggregationAttemptDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $currency public property
     */
    public $currency;

    /**
     * @todo Write general description for this property
     * @var integer|null $lastTransactionDate public property
     */
    public $lastTransactionDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $institutionLoginId public property
     */
    public $institutionLoginId;

    /**
     * @todo Write general description for this property
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
     * @param string  $id                     Initialization value for $this->id
     * @param string  $number                 Initialization value for $this->number
     * @param string  $name                   Initialization value for $this->name
     * @param double  $balance                Initialization value for $this->balance
     * @param string  $type                   Initialization value for $this->type
     * @param integer $aggregationStatusCode  Initialization value for $this->aggregationStatusCode
     * @param string  $status                 Initialization value for $this->status
     * @param string  $customerId             Initialization value for $this->customerId
     * @param string  $institutionId          Initialization value for $this->institutionId
     * @param integer $balanceDate            Initialization value for $this->balanceDate
     * @param integer $aggregationSuccessDate Initialization value for $this->aggregationSuccessDate
     * @param integer $aggregationAttemptDate Initialization value for $this->aggregationAttemptDate
     * @param integer $createdDate            Initialization value for $this->createdDate
     * @param string  $currency               Initialization value for $this->currency
     * @param integer $lastTransactionDate    Initialization value for $this->lastTransactionDate
     * @param integer $institutionLoginId     Initialization value for $this->institutionLoginId
     * @param integer $displayPosition        Initialization value for $this->displayPosition
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
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
            $this->displayPosition        = func_get_arg(16);
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
        $json['displayPosition']        = $this->displayPosition;

        return array_merge($json, $this->additionalProperties);
    }
}
