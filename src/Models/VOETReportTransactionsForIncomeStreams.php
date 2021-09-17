<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOETReportTransactionsForIncomeStreams implements JsonSerializable
{
    /**
     * The Finicity ID of the transaction
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * A timestamp showing when the transaction was posted or cleared by the institution (see Handling
     * Dates and Times)
     * @required
     * @var integer $postedDate public property
     */
    public $postedDate;

    /**
     * The description of the transaction, as provided by the institution (often known as payee). In the
     * event that this field is left blank by the institution, Finicity will pass a value of “No
     * description provided by institution”. All other values are provided by the institution.
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
     * The unique identifier given by the FI for each transaction.
     * @required
     * @var string $institutionTransactionId public property
     */
    public $institutionTransactionId;

    /**
     * The categorization of the transaction.
     * @required
     * @var string $category public property
     */
    public $category;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                       Initialization value for $this->id
     * @param integer $postedDate               Initialization value for $this->postedDate
     * @param string  $description              Initialization value for $this->description
     * @param string  $normalizedPayee          Initialization value for $this->normalizedPayee
     * @param string  $institutionTransactionId Initialization value for $this->institutionTransactionId
     * @param string  $category                 Initialization value for $this->category
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->id                       = func_get_arg(0);
            $this->postedDate               = func_get_arg(1);
            $this->description              = func_get_arg(2);
            $this->normalizedPayee          = func_get_arg(3);
            $this->institutionTransactionId = func_get_arg(4);
            $this->category                 = func_get_arg(5);
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
        $json['postedDate']               = $this->postedDate;
        $json['description']              = $this->description;
        $json['normalizedPayee']          = $this->normalizedPayee;
        $json['institutionTransactionId'] = $this->institutionTransactionId;
        $json['category']                 = $this->category;

        return array_merge($json, $this->additionalProperties);
    }
}
