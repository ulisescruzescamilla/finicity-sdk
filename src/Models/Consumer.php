<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Consumer implements JsonSerializable
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
     * The consumer’s street address
     * @required
     * @var string $address public property
     */
    public $address;

    /**
     * The consumer’s city
     * @required
     * @var string $city public property
     */
    public $city;

    /**
     * The consumer’s state
     * @required
     * @var string $state public property
     */
    public $state;

    /**
     * The consumer’s ZIP code
     * @required
     * @var string $zip public property
     */
    public $zip;

    /**
     * The consumer’s phone number
     * @required
     * @var string $phone public property
     */
    public $phone;

    /**
     * The last 4 digits of the consumer’s Social Security number
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
     * The consumer’s email address
     * @required
     * @var string $email public property
     */
    public $email;

    /**
     * Consumer created date
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

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
     * @param string   $id          Initialization value for $this->id
     * @param string   $firstName   Initialization value for $this->firstName
     * @param string   $lastName    Initialization value for $this->lastName
     * @param integer  $customerId  Initialization value for $this->customerId
     * @param string   $address     Initialization value for $this->address
     * @param string   $city        Initialization value for $this->city
     * @param string   $state       Initialization value for $this->state
     * @param string   $zip         Initialization value for $this->zip
     * @param string   $phone       Initialization value for $this->phone
     * @param string   $ssn         Initialization value for $this->ssn
     * @param Birthday $birthday    Initialization value for $this->birthday
     * @param string   $email       Initialization value for $this->email
     * @param integer  $createdDate Initialization value for $this->createdDate
     * @param string   $suffix      Initialization value for $this->suffix
     */
    public function __construct()
    {
        if (14 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->firstName   = func_get_arg(1);
            $this->lastName    = func_get_arg(2);
            $this->customerId  = func_get_arg(3);
            $this->address     = func_get_arg(4);
            $this->city        = func_get_arg(5);
            $this->state       = func_get_arg(6);
            $this->zip         = func_get_arg(7);
            $this->phone       = func_get_arg(8);
            $this->ssn         = func_get_arg(9);
            $this->birthday    = func_get_arg(10);
            $this->email       = func_get_arg(11);
            $this->createdDate = func_get_arg(12);
            $this->suffix      = func_get_arg(13);
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
        $json['firstName']   = $this->firstName;
        $json['lastName']    = $this->lastName;
        $json['customerId']  = $this->customerId;
        $json['address']     = $this->address;
        $json['city']        = $this->city;
        $json['state']       = $this->state;
        $json['zip']         = $this->zip;
        $json['phone']       = $this->phone;
        $json['ssn']         = $this->ssn;
        $json['birthday']    = $this->birthday;
        $json['email']       = $this->email;
        $json['createdDate'] = $this->createdDate;
        $json['suffix']      = $this->suffix;

        return array_merge($json, $this->additionalProperties);
    }
}
