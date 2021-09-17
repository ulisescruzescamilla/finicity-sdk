<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The finicity customer record
 */
class CustomerWithApplicationData implements JsonSerializable
{
    /**
     * Finicity’s ID for the customer
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * The username associated with the customer
     * @required
     * @var string $username public property
     */
    public $username;

    /**
     * The first name associated with the customer
     * @required
     * @var string $firstName public property
     */
    public $firstName;

    /**
     * The last name associated with the customer
     * @required
     * @var string $lastName public property
     */
    public $lastName;

    /**
     * active or testing
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The date the customer was created
     * @required
     * @var string $createdDate public property
     */
    public $createdDate;

    /**
     * The application id of the application assigned to the customer
     * @required
     * @var string $applicationId public property
     */
    public $applicationId;

    /**
     * The application name of the application assigned to the customer
     * @required
     * @var string $applicationName public property
     */
    public $applicationName;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $id              Initialization value for $this->id
     * @param string $username        Initialization value for $this->username
     * @param string $firstName       Initialization value for $this->firstName
     * @param string $lastName        Initialization value for $this->lastName
     * @param string $type            Initialization value for $this->type
     * @param string $createdDate     Initialization value for $this->createdDate
     * @param string $applicationId   Initialization value for $this->applicationId
     * @param string $applicationName Initialization value for $this->applicationName
     */
    public function __construct()
    {
        if (8 == func_num_args()) {
            $this->id              = func_get_arg(0);
            $this->username        = func_get_arg(1);
            $this->firstName       = func_get_arg(2);
            $this->lastName        = func_get_arg(3);
            $this->type            = func_get_arg(4);
            $this->createdDate     = func_get_arg(5);
            $this->applicationId   = func_get_arg(6);
            $this->applicationName = func_get_arg(7);
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
        $json['id']              = $this->id;
        $json['username']        = $this->username;
        $json['firstName']       = $this->firstName;
        $json['lastName']        = $this->lastName;
        $json['type']            = $this->type;
        $json['createdDate']     = $this->createdDate;
        $json['applicationId']   = $this->applicationId;
        $json['applicationName'] = $this->applicationName;

        return array_merge($json, $this->additionalProperties);
    }
}
