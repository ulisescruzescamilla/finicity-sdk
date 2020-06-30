<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The institutions certification subscription details
 */
class InstitutionsCertificationSubscription implements JsonSerializable
{
    /**
     * The Finicity Partner ID
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * The url to which the webhook events will be sent
     * @required
     * @var string $webhookUrl public property
     */
    public $webhookUrl;

    /**
     * The date the subscription was created
     * @required
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * The date the subscription was last updated
     * @required
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $partnerId  Initialization value for $this->partnerId
     * @param string $webhookUrl Initialization value for $this->webhookUrl
     * @param string $createdAt  Initialization value for $this->createdAt
     * @param string $updatedAt  Initialization value for $this->updatedAt
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->partnerId  = func_get_arg(0);
            $this->webhookUrl = func_get_arg(1);
            $this->createdAt  = func_get_arg(2);
            $this->updatedAt  = func_get_arg(3);
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
        $json['partnerId']  = $this->partnerId;
        $json['webhookUrl'] = $this->webhookUrl;
        $json['createdAt']  = $this->createdAt;
        $json['updatedAt']  = $this->updatedAt;

        return array_merge($json, $this->additionalProperties);
    }
}
