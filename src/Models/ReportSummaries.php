<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ReportSummaries implements JsonSerializable
{
    /**
     * Data pertaining to each report
     * @required
     * @var \FinicityAPILib\Models\ReportSummary[] $reports public property
     */
    public $reports;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array $reports Initialization value for $this->reports
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->reports = func_get_arg(0);
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
        $json['reports'] = $this->reports;

        return array_merge($json, $this->additionalProperties);
    }
}
