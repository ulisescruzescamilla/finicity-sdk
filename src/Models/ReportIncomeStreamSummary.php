<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *ReportIncomeStreamSummary
 */
class ReportIncomeStreamSummary implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $confidenceType public property
     */
    public $confidenceType;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\NetMonthly[] $netMonthly public property
     */
    public $netMonthly;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\ReportIncomeEstimate $incomeEstimate public property
     */
    public $incomeEstimate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $confidenceType Initialization value for $this->confidenceType
     * @param array                $netMonthly     Initialization value for $this->netMonthly
     * @param ReportIncomeEstimate $incomeEstimate Initialization value for $this->incomeEstimate
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->confidenceType = func_get_arg(0);
            $this->netMonthly     = func_get_arg(1);
            $this->incomeEstimate = func_get_arg(2);
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
        $json['confidenceType'] = $this->confidenceType;
        $json['netMonthly']     = $this->netMonthly;
        $json['incomeEstimate'] = $this->incomeEstimate;

        return array_merge($json, $this->additionalProperties);
    }
}
