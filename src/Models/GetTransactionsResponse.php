<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetTransactionsResponse implements JsonSerializable
{
    /**
     * Total number of records matching search criteria
     * @required
     * @var string $found public property
     */
    public $found;

    /**
     * Number of records in this response
     * @required
     * @var string $displaying public property
     */
    public $displaying;

    /**
     * true if this response does not contain the last record in the result set
     * @required
     * @var bool $moreAvailable public property
     */
    public $moreAvailable;

    /**
     * Value of the fromDate request parameter that generated this response
     * @required
     * @var string $fromDate public property
     */
    public $fromDate;

    /**
     * Value of the toDate request parameter that generated this response
     * @required
     * @var string $toDate public property
     */
    public $toDate;

    /**
     * Value of the sort request parameter that generated this response
     * @required
     * @var string $sort public property
     */
    public $sort;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Transaction[] $transactions public property
     */
    public $transactions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $found         Initialization value for $this->found
     * @param string $displaying    Initialization value for $this->displaying
     * @param bool   $moreAvailable Initialization value for $this->moreAvailable
     * @param string $fromDate      Initialization value for $this->fromDate
     * @param string $toDate        Initialization value for $this->toDate
     * @param string $sort          Initialization value for $this->sort
     * @param array  $transactions  Initialization value for $this->transactions
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->found         = func_get_arg(0);
            $this->displaying    = func_get_arg(1);
            $this->moreAvailable = func_get_arg(2);
            $this->fromDate      = func_get_arg(3);
            $this->toDate        = func_get_arg(4);
            $this->sort          = func_get_arg(5);
            $this->transactions  = func_get_arg(6);
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
        $json['found']         = $this->found;
        $json['displaying']    = $this->displaying;
        $json['moreAvailable'] = $this->moreAvailable;
        $json['fromDate']      = $this->fromDate;
        $json['toDate']        = $this->toDate;
        $json['sort']          = $this->sort;
        $json['transactions']  = $this->transactions;

        return array_merge($json, $this->additionalProperties);
    }
}
