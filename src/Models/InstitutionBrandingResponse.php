<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InstitutionBrandingResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Branding $branding public property
     */
    public $branding;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param Branding $branding Initialization value for $this->branding
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->branding = func_get_arg(0);
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
        $json['branding'] = $this->branding;

        return array_merge($json, $this->additionalProperties);
    }
}
