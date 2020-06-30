<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The account owner information for the customer account
 */
class AccountOwnerV1 implements JsonSerializable
{
    /**
     * The name of the account owner. In v1 this can be multiple account owners in one string. This is how
     * the source data is returned from the institution.
     * @required
     * @var string $ownerName public property
     */
    public $ownerName;

    /**
     * The address of the account owner
     * @required
     * @var string $ownerAddress public property
     */
    public $ownerAddress;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $ownerName    Initialization value for $this->ownerName
     * @param string $ownerAddress Initialization value for $this->ownerAddress
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->ownerName    = func_get_arg(0);
            $this->ownerAddress = func_get_arg(1);
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
        $json['ownerName']    = $this->ownerName;
        $json['ownerAddress'] = $this->ownerAddress;

        return array_merge($json, $this->additionalProperties);
    }
}
