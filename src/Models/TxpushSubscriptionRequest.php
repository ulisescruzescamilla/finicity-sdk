<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class TxpushSubscriptionRequest implements JsonSerializable
{
    /**
     * The TxPUSH Listener URL to receive TxPUSH notifications (must use https protocol for any real-world
     * account)
     * @required
     * @var string $callbackUrl public property
     */
    public $callbackUrl;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $callbackUrl Initialization value for $this->callbackUrl
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->callbackUrl = func_get_arg(0);
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

        return array_merge($json, $this->additionalProperties);
    }
}
