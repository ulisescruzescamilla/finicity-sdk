<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class StorePayStatementResponse implements JsonSerializable
{
    /**
     * The asset ID of the stored pay statement
     * @required
     * @var string $assetId public property
     */
    public $assetId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $assetId Initialization value for $this->assetId
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->assetId = func_get_arg(0);
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
        $json['assetId'] = $this->assetId;

        return array_merge($json, $this->additionalProperties);
    }
}
