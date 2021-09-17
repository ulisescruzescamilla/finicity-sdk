<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The fields used in the Transactions Report Transactions record
 */
class TransactionsReportTransaction implements JsonSerializable
{
    /**
     * The Finicity ID of the financial transaction.
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The total amount of the transaction. Transactions for deposits are positive values, and withdrawals
     * and debits are negative values.
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * A timestamp showing when the transaction was posted or cleared by the institution.
     * @required
     * @var integer $postedDate public property
     */
    public $postedDate;

    /**
     * The financial institution provides the description of the transaction (often known as the payee),
     * but if it’s left blank, then Finicity passes the value: No description provided by institution.
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * A normalized payee, derived from the transaction's description and memo fields.
     * @required
     * @var string $normalizedPayee public property
     */
    public $normalizedPayee;

    /**
     * The unique identifier given by the financial institution for each transaction.
     * @required
     * @var string $institutionTransactionId public property
     */
    public $institutionTransactionId;

    /**
     * A value from the Categories Enumerations, and assigned based on the payee name.
     * @required
     * @var string $category public property
     */
    public $category;

    /**
     * The memo field of the transaction, as provided by the institution. The institution must provide
     * either a description, a memo, or both. It is recommended to concatenate the two fields into a single
     * value
     * @required
     * @var string $memo public property
     */
    public $memo;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                       Initialization value for $this->id
     * @param double  $amount                   Initialization value for $this->amount
     * @param integer $postedDate               Initialization value for $this->postedDate
     * @param string  $description              Initialization value for $this->description
     * @param string  $normalizedPayee          Initialization value for $this->normalizedPayee
     * @param string  $institutionTransactionId Initialization value for $this->institutionTransactionId
     * @param string  $category                 Initialization value for $this->category
     * @param string  $memo                     Initialization value for $this->memo
     */
    public function __construct()
    {
        if (8 == func_num_args()) {
            $this->id                       = func_get_arg(0);
            $this->amount                   = func_get_arg(1);
            $this->postedDate               = func_get_arg(2);
            $this->description              = func_get_arg(3);
            $this->normalizedPayee          = func_get_arg(4);
            $this->institutionTransactionId = func_get_arg(5);
            $this->category                 = func_get_arg(6);
            $this->memo                     = func_get_arg(7);
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
        $json['id']                       = $this->id;
        $json['amount']                   = $this->amount;
        $json['postedDate']               = $this->postedDate;
        $json['description']              = $this->description;
        $json['normalizedPayee']          = $this->normalizedPayee;
        $json['institutionTransactionId'] = $this->institutionTransactionId;
        $json['category']                 = $this->category;
        $json['memo']                     = $this->memo;

        return array_merge($json, $this->additionalProperties);
    }
}
