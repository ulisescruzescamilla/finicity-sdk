<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The Response Structure For The Add Customer Endpoint and Add Testing Customer Endpoint
 */
class AddCustomerResponse implements JsonSerializable
{
    /**
     * The ID Of The New Customer Record
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The Username Value Of The New Customer Record
     * @required
     * @var string $username public property
     */
    public $username;

    /**
     * A Timestamp Of When The Customer Was Added (see Handling Dates And Times)
     * @required
     * @var string $createdDate public property
     */
    public $createdDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id          Initialization value for $this->id
     * @param string  $username    Initialization value for $this->username
     * @param string  $createdDate Initialization value for $this->createdDate
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->username    = func_get_arg(1);
            $this->createdDate = func_get_arg(2);
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
        $json['username']    = $this->username;
        $json['createdDate'] = $this->createdDate;

        return array_merge($json, $this->additionalProperties);
    }
}
