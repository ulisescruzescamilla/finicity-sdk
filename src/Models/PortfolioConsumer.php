<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PortfolioConsumer implements JsonSerializable
{
    /**
     * Finicity ID of the consumer (UUID with max length 32 characters)
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * The consumer first name(s) / given name(s)
     * @required
     * @var string $firstName public property
     */
    public $firstName;

    /**
     * The consumer last name(s) / surname(s)
     * @required
     * @var string $lastName public property
     */
    public $lastName;

    /**
     * Finicity's ID of the customer
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * The consumer’s 9-digit Social Security number (may include separators: nnn-nn-nnnn)
     * @required
     * @var string $ssn public property
     */
    public $ssn;

    /**
     * The consumer birth date
     * @required
     * @var \FinicityAPILib\Models\Birthday $birthday public property
     */
    public $birthday;

    /**
     * The consumer suffix
     * @var string|null $suffix public property
     */
    public $suffix;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string   $id         Initialization value for $this->id
     * @param string   $firstName  Initialization value for $this->firstName
     * @param string   $lastName   Initialization value for $this->lastName
     * @param integer  $customerId Initialization value for $this->customerId
     * @param string   $ssn        Initialization value for $this->ssn
     * @param Birthday $birthday   Initialization value for $this->birthday
     * @param string   $suffix     Initialization value for $this->suffix
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->id         = func_get_arg(0);
            $this->firstName  = func_get_arg(1);
            $this->lastName   = func_get_arg(2);
            $this->customerId = func_get_arg(3);
            $this->ssn        = func_get_arg(4);
            $this->birthday   = func_get_arg(5);
            $this->suffix     = func_get_arg(6);
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
        $json['firstName']  = $this->firstName;
        $json['lastName']   = $this->lastName;
        $json['customerId'] = $this->customerId;
        $json['ssn']        = $this->ssn;
        $json['birthday']   = $this->birthday;
        $json['suffix']     = $this->suffix;

        return array_merge($json, $this->additionalProperties);
    }
}
