<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class BankAccountStatementV2Response implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $asOfDate public property
     */
    public $asOfDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $id       Initialization value for $this->id
     * @param integer $asOfDate Initialization value for $this->asOfDate
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->id       = func_get_arg(0);
            $this->asOfDate = func_get_arg(1);
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
        $json['id']       = $this->id;
        $json['asOfDate'] = $this->asOfDate;

        return array_merge($json, $this->additionalProperties);
    }
}
