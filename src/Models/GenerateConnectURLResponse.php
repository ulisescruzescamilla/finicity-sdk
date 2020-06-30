<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Response from create url call
 */
class GenerateConnectURLResponse implements JsonSerializable
{
    /**
     * The generated Connect URL
     * @required
     * @var string $link public property
     */
    public $link;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $link Initialization value for $this->link
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->link = func_get_arg(0);
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
        $json['link'] = $this->link;

        return array_merge($json, $this->additionalProperties);
    }
}
