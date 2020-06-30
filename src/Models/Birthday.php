<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The consumer birth date
 */
class Birthday implements JsonSerializable
{
    /**
     * The birthday 4-digit year
     * @var integer|null $year public property
     */
    public $year;

    /**
     * The birthday 2-digit month (01 is January)
     * @var integer|null $month public property
     */
    public $month;

    /**
     * The birthday 2-digit day-of-month
     * @var integer|null $dayOfMonth public property
     */
    public $dayOfMonth;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $year       Initialization value for $this->year
     * @param integer $month      Initialization value for $this->month
     * @param integer $dayOfMonth Initialization value for $this->dayOfMonth
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->year       = func_get_arg(0);
            $this->month      = func_get_arg(1);
            $this->dayOfMonth = func_get_arg(2);
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
        $json['year']       = $this->year;
        $json['month']      = $this->month;
        $json['dayOfMonth'] = $this->dayOfMonth;

        return array_merge($json, $this->additionalProperties);
    }
}
