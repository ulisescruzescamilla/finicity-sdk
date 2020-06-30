<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Response for TxPush test transaction
 */
class CreateTxpushTestTransactionResponse implements JsonSerializable
{
    /**
     * The ID of the new transaction record
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * A timestamp of when the transaction was added (see Handling Dates and Times)
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id          Initialization value for $this->id
     * @param integer $createdDate Initialization value for $this->createdDate
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->createdDate = func_get_arg(1);
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
        $json['id']          = $this->id;
        $json['createdDate'] = $this->createdDate;

        return array_merge($json, $this->additionalProperties);
    }
}
