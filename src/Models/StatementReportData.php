<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class StatementReportData implements JsonSerializable
{
    /**
     * Specify the account to retrieve the statement for and display in the report.
     * @required
     * @var integer $accountId public property
     */
    public $accountId;

    /**
     * Index of statement to retrieve (default is 1, maximum is 6)
     * @var integer|null $index public property
     */
    public $index;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $accountId Initialization value for $this->accountId
     * @param integer $index     Initialization value for $this->index
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->accountId = func_get_arg(0);
            $this->index     = func_get_arg(1);
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
        $json['accountId'] = $this->accountId;
        $json['index']     = $this->index;

        return array_merge($json, $this->additionalProperties);
    }
}
