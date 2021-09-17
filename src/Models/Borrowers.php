<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Borrowers implements JsonSerializable
{
    /**
     * Customer ID from the [Add Customer API]( https://api-reference.finicity.com/#/rest/api-
     * endpoints/customer/add-customer)
     * @required
     * @var string $customerId public property
     */
    public $customerId;

    /**
     * Consumer ID from the [Create Consumer API]( https://api-reference.finicity.com/#/rest/api-
     * endpoints/consumer/create-consumer)
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * (MVS) Borrower type: `primary` or `jointBorrower`
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * (MVS-Optional) Optional consumer information such as the consumer’s SSN and DOB. Use to prepopulate
     * the consumer’s SSN (only the last 4 digits appear) and DOB on the Find employment records page at
     * the beginning of the MVS payroll module.
     * @var \FinicityAPILib\Models\OptionalConsumerInfo|null $optionalConsumerInfo public property
     */
    public $optionalConsumerInfo;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $customerId           Initialization value for $this->customerId
     * @param string               $consumerId           Initialization value for $this->consumerId
     * @param string               $type                 Initialization value for $this->type
     * @param OptionalConsumerInfo $optionalConsumerInfo Initialization value for $this->optionalConsumerInfo
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->customerId           = func_get_arg(0);
            $this->consumerId           = func_get_arg(1);
            $this->type                 = func_get_arg(2);
            $this->optionalConsumerInfo = func_get_arg(3);
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
        $json['customerId']           = $this->customerId;
        $json['consumerId']           = $this->consumerId;
        $json['type']                 = $this->type;
        $json['optionalConsumerInfo'] = $this->optionalConsumerInfo;

        return array_merge($json, $this->additionalProperties);
    }
}
