<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Response For Get Customers Endpoint
 */
class GetCustomersResponse implements JsonSerializable
{
    /**
     * Total number of records matching search criteria
     * @required
     * @var integer $found public property
     */
    public $found;

    /**
     * Number of records in this response
     * @required
     * @var integer $displaying public property
     */
    public $displaying;

    /**
     * true if this response does not contain the last record in the result set
     * @required
     * @var bool $moreAvailable public property
     */
    public $moreAvailable;

    /**
     * List of customer records
     * @required
     * @var \FinicityAPILib\Models\Customer[] $customers public property
     */
    public $customers;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $found         Initialization value for $this->found
     * @param integer $displaying    Initialization value for $this->displaying
     * @param bool    $moreAvailable Initialization value for $this->moreAvailable
     * @param array   $customers     Initialization value for $this->customers
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->found         = func_get_arg(0);
            $this->displaying    = func_get_arg(1);
            $this->moreAvailable = func_get_arg(2);
            $this->customers     = func_get_arg(3);
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
        $json['customers']     = $this->customers;

        return array_merge($json, $this->additionalProperties);
    }
}
