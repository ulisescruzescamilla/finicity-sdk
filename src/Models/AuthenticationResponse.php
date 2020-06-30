<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AuthenticationResponse implements JsonSerializable
{
    /**
     * A Temporary Access Token Which Must Be Passed In The HTTP Header "Finicity-App-Token" On All
     * Subsequent API Requests.
     * @required
     * @var string $token public property
     */
    public $token;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $token Initialization value for $this->token
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->token = func_get_arg(0);
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
        $json['token'] = $this->token;

        return array_merge($json, $this->additionalProperties);
    }
}
