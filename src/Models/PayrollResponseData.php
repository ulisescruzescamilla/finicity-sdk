<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollResponseData implements JsonSerializable
{
    /**
     * An id to identify the data retrieved from the payroll providers for the report.
     * @required
     * @var string $payrollDataRetrievalId public property
     */
    public $payrollDataRetrievalId;

    /**
     * An array of employer names that the consumer submitted after completing the Connect application.
     * @required
     * @var array $employerNames public property
     */
    public $employerNames;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $payrollDataRetrievalId Initialization value for $this->payrollDataRetrievalId
     * @param array  $employerNames          Initialization value for $this->employerNames
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->payrollDataRetrievalId = func_get_arg(0);
            $this->employerNames          = func_get_arg(1);
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
        $json['payrollDataRetrievalId'] = $this->payrollDataRetrievalId;
        $json['employerNames']          = $this->employerNames;

        return array_merge($json, $this->additionalProperties);
    }
}
