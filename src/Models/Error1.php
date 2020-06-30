<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Error1 implements JsonSerializable
{
    /**
     * Error code
     * @var integer|null $code public property
     */
    public $code;

    /**
     * Error message
     * @var string|null $message public property
     */
    public $message;

    /**
     * Finicity's asset ID
     * @var string|null $assetId public property
     */
    public $assetId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $code    Initialization value for $this->code
     * @param string  $message Initialization value for $this->message
     * @param string  $assetId Initialization value for $this->assetId
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->code    = func_get_arg(0);
            $this->message = func_get_arg(1);
            $this->assetId = func_get_arg(2);
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
        $json['code']    = $this->code;
        $json['message'] = $this->message;
        $json['assetId'] = $this->assetId;

        return array_merge($json, $this->additionalProperties);
    }
}
