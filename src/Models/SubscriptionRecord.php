<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *TxPush subscription details
 */
class SubscriptionRecord implements JsonSerializable
{
    /**
     * Unique subscription identifier
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The Finicity account Id for the subscription
     * @required
     * @var integer $accountId public property
     */
    public $accountId;

    /**
     * Event subscription type. account or transaction
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The url for the events
     * @required
     * @var string $callbackUrl public property
     */
    public $callbackUrl;

    /**
     * Signing key for events
     * @required
     * @var string $signingKey public property
     */
    public $signingKey;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id          Initialization value for $this->id
     * @param integer $accountId   Initialization value for $this->accountId
     * @param string  $type        Initialization value for $this->type
     * @param string  $callbackUrl Initialization value for $this->callbackUrl
     * @param string  $signingKey  Initialization value for $this->signingKey
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->accountId   = func_get_arg(1);
            $this->type        = func_get_arg(2);
            $this->callbackUrl = func_get_arg(3);
            $this->signingKey  = func_get_arg(4);
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
        $json['id']          = $this->id;
        $json['accountId']   = $this->accountId;
        $json['type']        = $this->type;
        $json['callbackUrl'] = $this->callbackUrl;
        $json['signingKey']  = $this->signingKey;

        return array_merge($json, $this->additionalProperties);
    }
}
