<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *oauthOptions for oauthEnabled institutions
 */
class ConnectOauthOptions implements JsonSerializable
{
    /**
     * Indicates if OAuth institutions should be enabled for the session
     * @required
     * @var bool $enabled public property
     */
    public $enabled;

    /**
     * If set to true, Connect will replace OAuth institutions based on the customer's existing accounts. e.
     * g if the customer has a legacy Chase account, legacy Chase will be used throughout the session but
     * if the user doesn't have a Capital One legacy account, OAuth Capital One will be used for the
     * session.
     * @var bool|null $autoReplace public property
     */
    public $autoReplace;

    /**
     * Provides the ability to control what institutions should or shouldn't be displayed to the user
     * @var object|null $institutions public property
     */
    public $institutions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param bool   $enabled      Initialization value for $this->enabled
     * @param bool   $autoReplace  Initialization value for $this->autoReplace
     * @param object $institutions Initialization value for $this->institutions
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->enabled      = func_get_arg(0);
            $this->autoReplace  = func_get_arg(1);
            $this->institutions = func_get_arg(2);
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
        $json['enabled']      = $this->enabled;
        $json['autoReplace']  = $this->autoReplace;
        $json['institutions'] = $this->institutions;

        return array_merge($json, $this->additionalProperties);
    }
}
