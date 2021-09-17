<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ModifyConsumerRequest implements JsonSerializable
{
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
     * The consumer’s email address
     * @required
     * @var string $email public property
     */
    public $email;

    /**
     * The consumer suffix
     * @var string|null $suffix public property
     */
    public $suffix;

    /**
     * The consumer’s email address
     * @required
     * @var string $emailAddress public property
     */
    public $emailAddress;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string   $firstName    Initialization value for $this->firstName
     * @param string   $lastName     Initialization value for $this->lastName
     * @param string   $address      Initialization value for $this->address
     * @param string   $city         Initialization value for $this->city
     * @param string   $state        Initialization value for $this->state
     * @param string   $zip          Initialization value for $this->zip
     * @param string   $phone        Initialization value for $this->phone
     * @param string   $ssn          Initialization value for $this->ssn
     * @param Birthday $birthday     Initialization value for $this->birthday
     * @param string   $email        Initialization value for $this->email
     * @param string   $suffix       Initialization value for $this->suffix
     * @param string   $emailAddress Initialization value for $this->emailAddress
     */
    public function __construct()
    {
        if (12 == func_num_args()) {
            $this->firstName    = func_get_arg(0);
            $this->lastName     = func_get_arg(1);
            $this->address      = func_get_arg(2);
            $this->city         = func_get_arg(3);
            $this->state        = func_get_arg(4);
            $this->zip          = func_get_arg(5);
            $this->phone        = func_get_arg(6);
            $this->ssn          = func_get_arg(7);
            $this->birthday     = func_get_arg(8);
            $this->email        = func_get_arg(9);
            $this->suffix       = func_get_arg(10);
            $this->emailAddress = func_get_arg(11);
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
        $json['firstName']    = $this->firstName;
        $json['lastName']     = $this->lastName;
        $json['address']      = $this->address;
        $json['city']         = $this->city;
        $json['state']        = $this->state;
        $json['zip']          = $this->zip;
        $json['phone']        = $this->phone;
        $json['ssn']          = $this->ssn;
        $json['birthday']     = $this->birthday;
        $json['email']        = $this->email;
        $json['suffix']       = $this->suffix;
        $json['emailAddress'] = $this->emailAddress;

        return array_merge($json, $this->additionalProperties);
    }
}
