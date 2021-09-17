<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Report Income Estimate
 */
class ReportIncomeEstimate implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var double $netAnnual public property
     */
    public $netAnnual;

    /**
     * @todo Write general description for this property
     * @required
     * @var double $projectedNetAnnual public property
     */
    public $projectedNetAnnual;

    /**
     * @todo Write general description for this property
     * @required
     * @var double $estimatedGrossAnnual public property
     */
    public $estimatedGrossAnnual;

    /**
     * @todo Write general description for this property
     * @required
     * @var double $projectedGrossAnnual public property
     */
    public $projectedGrossAnnual;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param double $netAnnual            Initialization value for $this->netAnnual
     * @param double $projectedNetAnnual   Initialization value for $this->projectedNetAnnual
     * @param double $estimatedGrossAnnual Initialization value for $this->estimatedGrossAnnual
     * @param double $projectedGrossAnnual Initialization value for $this->projectedGrossAnnual
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->netAnnual            = func_get_arg(0);
            $this->projectedNetAnnual   = func_get_arg(1);
            $this->estimatedGrossAnnual = func_get_arg(2);
            $this->projectedGrossAnnual = func_get_arg(3);
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
        $json['netAnnual']            = $this->netAnnual;
        $json['projectedNetAnnual']   = $this->projectedNetAnnual;
        $json['estimatedGrossAnnual'] = $this->estimatedGrossAnnual;
        $json['projectedGrossAnnual'] = $this->projectedGrossAnnual;

        return array_merge($json, $this->additionalProperties);
    }
}
