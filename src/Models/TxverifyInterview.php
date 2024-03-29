<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class TxverifyInterview implements JsonSerializable
{
    /**
     * The assetId assigned to the pay statement. Generated by Connect or by the Client by using the Store
     * Customer Pay Statement API.
     * @required
     * @var string $assetId public property
     */
    public $assetId;

    /**
     * The accounts added by the consumer in Connect, if applicable
     * @var array|null $accounts public property
     */
    public $accounts;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $assetId  Initialization value for $this->assetId
     * @param array  $accounts Initialization value for $this->accounts
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->assetId  = func_get_arg(0);
            $this->accounts = func_get_arg(1);
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
        $json['assetId']  = $this->assetId;
        $json['accounts'] = $this->accounts;

        return array_merge($json, $this->additionalProperties);
    }
}
