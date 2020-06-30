<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Create a text transaction for TxPush testing
 */
class CreateTxpushTestTransactionRequest implements JsonSerializable
{
    /**
     * The amount of the transaction
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * The description of the transaction
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * active or pending (optional)
     * @var string|null $status public property
     */
    public $status;

    /**
     * An optional timestamp for the transaction’s posted date value for this transaction (see Handling
     * Dates and Times). Timestamp must be no more than 6 months from the current date.
     * @required
     * @var integer $postedDate public property
     */
    public $postedDate;

    /**
     * An optional timestamp for the transaction’s posted date value for this transaction (see Handling
     * Dates and Times)
     * @required
     * @var integer $transactionDate public property
     */
    public $transactionDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param double  $amount          Initialization value for $this->amount
     * @param string  $description     Initialization value for $this->description
     * @param string  $status          Initialization value for $this->status
     * @param integer $postedDate      Initialization value for $this->postedDate
     * @param integer $transactionDate Initialization value for $this->transactionDate
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 5:
                $this->amount          = func_get_arg(0);
                $this->description     = func_get_arg(1);
                $this->status          = func_get_arg(2);
                $this->postedDate      = func_get_arg(3);
                $this->transactionDate = func_get_arg(4);
                break;

            default:
                $this->status = 'active';
                break;
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
        $json['amount']          = $this->amount;
        $json['description']     = $this->description;
        $json['status']          = $this->status;
        $json['postedDate']      = $this->postedDate;
        $json['transactionDate'] = $this->transactionDate;

        return array_merge($json, $this->additionalProperties);
    }
}
