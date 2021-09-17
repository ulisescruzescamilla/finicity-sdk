<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CadenceDetails implements JsonSerializable
{
    /**
     * postedDate of the first deposit transaction
     * @var integer|null $startDate public property
     */
    public $startDate;

    /**
     * postedDate of the final deposit transaction (omitted if status is active)
     * @var integer|null $stopDate public property
     */
    public $stopDate;

    /**
     * Number of days between the recurring deposits
     * @var integer|null $days public property
     */
    public $days;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $startDate Initialization value for $this->startDate
     * @param integer $stopDate  Initialization value for $this->stopDate
     * @param integer $days      Initialization value for $this->days
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->startDate = func_get_arg(0);
            $this->stopDate  = func_get_arg(1);
            $this->days      = func_get_arg(2);
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
        $json['startDate'] = $this->startDate;
        $json['stopDate']  = $this->stopDate;
        $json['days']      = $this->days;

        return array_merge($json, $this->additionalProperties);
    }
}
