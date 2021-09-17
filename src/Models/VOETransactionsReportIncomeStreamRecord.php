<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOETransactionsReportIncomeStreamRecord implements JsonSerializable
{
    /**
     * Finicity’s income stream ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * A human-readable name based on the normalizedPayee name of the transactions for this income stream
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * active or inactive
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $estimateInclusion public property
     */
    public $estimateInclusion;

    /**
     * Level of confidence that the deposit stream represents income (example: 85%)
     * @required
     * @var integer $confidence public property
     */
    public $confidence;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\CadenceDetails $cadence public property
     */
    public $cadence;

    /**
     * The number of days since the last credit transaction for the particular income stream
     * @required
     * @var integer $daysSinceLastTransaction public property
     */
    public $daysSinceLastTransaction;

    /**
     * The next expected credit transaction date for the particular income stream, based on the cadence
     * @required
     * @var integer $nextExpectedTransactionDate public property
     */
    public $nextExpectedTransactionDate;

    /**
     * The number of months the income transactions are observed
     * @required
     * @var integer $incomeStreamMonths public property
     */
    public $incomeStreamMonths;

    /**
     * A list of transaction records
     * @required
     * @var \FinicityAPILib\Models\VOETReportTransactionsForIncomeStreams[] $transactions public property
     */
    public $transactions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string         $id                          Initialization value for $this->id
     * @param string         $name                        Initialization value for $this->name
     * @param string         $status                      Initialization value for $this->status
     * @param string         $estimateInclusion           Initialization value for $this->estimateInclusion
     * @param integer        $confidence                  Initialization value for $this->confidence
     * @param CadenceDetails $cadence                     Initialization value for $this->cadence
     * @param integer        $daysSinceLastTransaction    Initialization value for $this->daysSinceLastTransaction
     * @param integer        $nextExpectedTransactionDate Initialization value for $this->nextExpectedTransactionDate
     * @param integer        $incomeStreamMonths          Initialization value for $this->incomeStreamMonths
     * @param array          $transactions                Initialization value for $this->transactions
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->id                          = func_get_arg(0);
            $this->name                        = func_get_arg(1);
            $this->status                      = func_get_arg(2);
            $this->estimateInclusion           = func_get_arg(3);
            $this->confidence                  = func_get_arg(4);
            $this->cadence                     = func_get_arg(5);
            $this->daysSinceLastTransaction    = func_get_arg(6);
            $this->nextExpectedTransactionDate = func_get_arg(7);
            $this->incomeStreamMonths          = func_get_arg(8);
            $this->transactions                = func_get_arg(9);
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
        $json['id']                          = $this->id;
        $json['name']                        = $this->name;
        $json['status']                      = $this->status;
        $json['estimateInclusion']           = $this->estimateInclusion;
        $json['confidence']                  = $this->confidence;
        $json['cadence']                     = $this->cadence;
        $json['daysSinceLastTransaction']    = $this->daysSinceLastTransaction;
        $json['nextExpectedTransactionDate'] = $this->nextExpectedTransactionDate;
        $json['incomeStreamMonths']          = $this->incomeStreamMonths;
        $json['transactions']                = $this->transactions;

        return array_merge($json, $this->additionalProperties);
    }
}
