<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Callback implements JsonSerializable
{
    /**
     * The callback url for the events
     * @var string|null $callbackUrl public property
     */
    public $callbackUrl;

    /**
     * The content type for the body of the events
     * @var string|null $contentType public property
     */
    public $contentType;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $callbackUrl Initialization value for $this->callbackUrl
     * @param string $contentType Initialization value for $this->contentType
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->callbackUrl = func_get_arg(0);
            $this->contentType = func_get_arg(1);
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
        $json['callbackUrl'] = $this->callbackUrl;
        $json['contentType'] = $this->contentType;

        return array_merge($json, $this->additionalProperties);
    }
}
