<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowInstitution implements JsonSerializable
{
    /**
     * Finicity institution ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Finicity institution name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The URL of the Financial Institution
     * @required
     * @var string $urlHomeApp public property
     */
    public $urlHomeApp;

    /**
     * A list of `account` records
     * @required
     * @var \FinicityAPILib\Models\CashFlowAccount[] $accounts public property
     */
    public $accounts;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $id         Initialization value for $this->id
     * @param string $name       Initialization value for $this->name
     * @param string $urlHomeApp Initialization value for $this->urlHomeApp
     * @param array  $accounts   Initialization value for $this->accounts
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->id         = func_get_arg(0);
            $this->name       = func_get_arg(1);
            $this->urlHomeApp = func_get_arg(2);
            $this->accounts   = func_get_arg(3);
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
        $json['id']         = $this->id;
        $json['name']       = $this->name;
        $json['urlHomeApp'] = $this->urlHomeApp;
        $json['accounts']   = $this->accounts;

        return array_merge($json, $this->additionalProperties);
    }
}
