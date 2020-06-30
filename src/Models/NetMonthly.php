<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class NetMonthly implements JsonSerializable
{
    /**
     * Timestamp for the first day of this month
     * @required
     * @var integer $month public property
     */
    public $month;

    /**
     * Total income during the given month, across all income streams
     * @required
     * @var double $net public property
     */
    public $net;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $month Initialization value for $this->month
     * @param double  $net   Initialization value for $this->net
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->month = func_get_arg(0);
            $this->net   = func_get_arg(1);
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
        $json['month'] = $this->month;
        $json['net']   = $this->net;

        return array_merge($json, $this->additionalProperties);
    }
}
