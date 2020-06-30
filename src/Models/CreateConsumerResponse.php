<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CreateConsumerResponse implements JsonSerializable
{
    /**
     * Finicity ID of the consumer (UUID with max length 32 characters)
     * @var string|null $id public property
     */
    public $id;

    /**
     * Consumer created date
     * @var integer|null $createdDate public property
     */
    public $createdDate;

    /**
     * Finicity?s ID of the customer
     * @var integer|null $customerId public property
     */
    public $customerId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $id          Initialization value for $this->id
     * @param integer $createdDate Initialization value for $this->createdDate
     * @param integer $customerId  Initialization value for $this->customerId
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->createdDate = func_get_arg(1);
            $this->customerId  = func_get_arg(2);
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
        $json['createdDate'] = $this->createdDate;
        $json['customerId']  = $this->customerId;

        return array_merge($json, $this->additionalProperties);
    }
}
