<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Account1 implements JsonSerializable
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
     * @required
     * @var integer $balanceDate public property
     */
    public $balanceDate;

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
     * @param string  $id                 Initialization value for $this->id
     * @param string  $number             Initialization value for $this->number
     * @param string  $name               Initialization value for $this->name
     * @param double  $balance            Initialization value for $this->balance
     * @param string  $type               Initialization value for $this->type
     * @param string  $status             Initialization value for $this->status
     * @param string  $customerId         Initialization value for $this->customerId
     * @param string  $institutionId      Initialization value for $this->institutionId
     * @param integer $balanceDate        Initialization value for $this->balanceDate
     * @param integer $createdDate        Initialization value for $this->createdDate
     * @param string  $currency           Initialization value for $this->currency
     * @param integer $institutionLoginId Initialization value for $this->institutionLoginId
     * @param integer $displayPosition    Initialization value for $this->displayPosition
     */
    public function __construct()
    {
        if (13 == func_num_args()) {
            $this->id                 = func_get_arg(0);
            $this->number             = func_get_arg(1);
            $this->name               = func_get_arg(2);
            $this->balance            = func_get_arg(3);
            $this->type               = func_get_arg(4);
            $this->status             = func_get_arg(5);
            $this->customerId         = func_get_arg(6);
            $this->institutionId      = func_get_arg(7);
            $this->balanceDate        = func_get_arg(8);
            $this->createdDate        = func_get_arg(9);
            $this->currency           = func_get_arg(10);
            $this->institutionLoginId = func_get_arg(11);
            $this->displayPosition    = func_get_arg(12);
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
        $json['id']                 = $this->id;
        $json['number']             = $this->number;
        $json['name']               = $this->name;
        $json['balance']            = $this->balance;
        $json['type']               = $this->type;
        $json['status']             = $this->status;
        $json['customerId']         = $this->customerId;
        $json['institutionId']      = $this->institutionId;
        $json['balanceDate']        = $this->balanceDate;
        $json['createdDate']        = $this->createdDate;
        $json['currency']           = $this->currency;
        $json['institutionLoginId'] = $this->institutionLoginId;
        $json['displayPosition']    = $this->displayPosition;

        return array_merge($json, $this->additionalProperties);
    }
}
