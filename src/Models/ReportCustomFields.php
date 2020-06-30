<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ReportCustomFields implements JsonSerializable
{
    /**
     * The label for the custom field
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * The value of the custom field
     * @required
     * @var string $value public property
     */
    public $value;

    /**
     * Indicates whether the field should be shown in the consumer version of the report
     * @required
     * @var bool $shown public property
     */
    public $shown;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $label Initialization value for $this->label
     * @param string $value Initialization value for $this->value
     * @param bool   $shown Initialization value for $this->shown
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->label = func_get_arg(0);
            $this->value = func_get_arg(1);
            $this->shown = func_get_arg(2);
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
        $json['label'] = $this->label;
        $json['value'] = $this->value;
        $json['shown'] = $this->shown;

        return array_merge($json, $this->additionalProperties);
    }
}
