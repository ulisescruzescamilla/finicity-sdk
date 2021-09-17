<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The response from the send email endpoint.
 */
class GenerateV2ConnectEmailResponse implements JsonSerializable
{
    /**
     * The URL generated to send a Connect email
     * @required
     * @var string $link public property
     */
    public $link;

    /**
     * The configuration used to generate the Connect email.
     * @required
     * @var \FinicityAPILib\Models\ConnectV2EmailOptions $emailConfig public property
     */
    public $emailConfig;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                $link        Initialization value for $this->link
     * @param ConnectV2EmailOptions $emailConfig Initialization value for $this->emailConfig
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->link        = func_get_arg(0);
            $this->emailConfig = func_get_arg(1);
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
        $json['link']        = $this->link;
        $json['emailConfig'] = $this->emailConfig;

        return array_merge($json, $this->additionalProperties);
    }
}
