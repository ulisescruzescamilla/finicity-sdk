<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InterviewAccounts implements JsonSerializable
{
    /**
     * The accountId of the selected account during the Account Interview process.
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The customer entered value of the amount deposited into the account during the Account Interview
     * process. This is an optional field.
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id     Initialization value for $this->id
     * @param double  $amount Initialization value for $this->amount
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->id     = func_get_arg(0);
            $this->amount = func_get_arg(1);
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
        $json['id']     = $this->id;
        $json['amount'] = $this->amount;

        return array_merge($json, $this->additionalProperties);
    }
}
