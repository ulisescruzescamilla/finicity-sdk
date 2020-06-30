<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ReportTransaction implements JsonSerializable
{
    /**
     * The Finicity ID of the transaction
     * @var integer|null $id public property
     */
    public $id;

    /**
     * The total amount of the transaction. Transactions for deposits are positive values, withdrawals and
     * debits are negative values.
     * @var double|null $amount public property
     */
    public $amount;

    /**
     * A timestamp showing when the transaction was posted or cleared by the institution (see Handling
     * Dates and Times)
     * @var integer|null $postedDate public property
     */
    public $postedDate;

    /**
     * The description of the transaction, as provided by the institution (often known as payee). In the
     * event that this field is left blank by the institution, Finicity will pass a value of “No
     * description provided by institution”. All other values are provided by the institution.
     * @var string|null $description public property
     */
    public $description;

    /**
     * The memo field of the transaction, as provided by the institution. The institution must provide
     * either a description, a memo, or both. It is recommended to concatenate the two fields into a single
     * value
     * @var string|null $memo public property
     */
    public $memo;

    /**
     * A normalized payee, derived from the transaction's description and memo fields.
     * @var string|null $normalizedPayee public property
     */
    public $normalizedPayee;

    /**
     * The unique identifier given by the FI for each transaction.
     * @var string|null $institutionTransactionId public property
     */
    public $institutionTransactionId;

    /**
     * The categorization of the transaction.
     * @var string|null $category public property
     */
    public $category;

    /**
     * One of the values from Transaction Types (optional)
     * @var string|null $type public property
     */
    public $type;

    /**
     * Field to indicate how transaction is matched with pay statement
     * @var array|null $payStatementMatchTypes public property
     */
    public $payStatementMatchTypes;

    /**
     * Combines the description and memo data together, removes any duplicated information from description
     * to memo, and removes any numbers or special characters
     * @var string|null $bestRepresentation public property
     */
    public $bestRepresentation;

    /**
     * The type of investment security (VOA only)
     * @var string|null $securityType public property
     */
    public $securityType;

    /**
     * Investment symbol (VOA only)
     * @var string|null $symbol public property
     */
    public $symbol;

    /**
     * @todo Write general description for this property
     * @var double|null $commission public property
     */
    public $commission;

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
     * @param string  $memo                     Initialization value for $this->memo
     * @param string  $normalizedPayee          Initialization value for $this->normalizedPayee
     * @param string  $institutionTransactionId Initialization value for $this->institutionTransactionId
     * @param string  $category                 Initialization value for $this->category
     * @param string  $type                     Initialization value for $this->type
     * @param array   $payStatementMatchTypes   Initialization value for $this->payStatementMatchTypes
     * @param string  $bestRepresentation       Initialization value for $this->bestRepresentation
     * @param string  $securityType             Initialization value for $this->securityType
     * @param string  $symbol                   Initialization value for $this->symbol
     * @param double  $commission               Initialization value for $this->commission
     */
    public function __construct()
    {
        if (14 == func_num_args()) {
            $this->id                       = func_get_arg(0);
            $this->amount                   = func_get_arg(1);
            $this->postedDate               = func_get_arg(2);
            $this->description              = func_get_arg(3);
            $this->memo                     = func_get_arg(4);
            $this->normalizedPayee          = func_get_arg(5);
            $this->institutionTransactionId = func_get_arg(6);
            $this->category                 = func_get_arg(7);
            $this->type                     = func_get_arg(8);
            $this->payStatementMatchTypes   = func_get_arg(9);
            $this->bestRepresentation       = func_get_arg(10);
            $this->securityType             = func_get_arg(11);
            $this->symbol                   = func_get_arg(12);
            $this->commission               = func_get_arg(13);
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
        $json['memo']                     = $this->memo;
        $json['normalizedPayee']          = $this->normalizedPayee;
        $json['institutionTransactionId'] = $this->institutionTransactionId;
        $json['category']                 = $this->category;
        $json['type']                     = $this->type;
        $json['payStatementMatchTypes']   = $this->payStatementMatchTypes;
        $json['bestRepresentation']       = $this->bestRepresentation;
        $json['securityType']             = $this->securityType;
        $json['symbol']                   = $this->symbol;
        $json['commission']               = $this->commission;

        return array_merge($json, $this->additionalProperties);
    }
}
