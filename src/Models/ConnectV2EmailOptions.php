<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The parameter definitions used to configure the Connect email's sent to customers.
 */
class ConnectV2EmailOptions implements JsonSerializable
{
    /**
     * The email address for the customer receiving the Connect email.
     * @required
     * @var string $to public property
     */
    public $to;

    /**
     * The name of a person or business sending the Connect email.
     * @var string|null $from public property
     */
    public $from;

    /**
     * (Optional) The support phone number listed in the email.
     * @var string|null $supportPhone public property
     */
    public $supportPhone;

    /**
     * (Optional) The subject line of the email. The default is Verify your Financial Information.
     * @var string|null $subject public property
     */
    public $subject;

    /**
     * (Optional) The first name of the customer or both names of the customers for joint borrowers.
     * Example: Marvin and Jenny.
     * @var string|null $firstName public property
     */
    public $firstName;

    /**
     * (Optional) The name of your company.
     * @var string|null $institutionName public property
     */
    public $institutionName;

    /**
     * (Optional) The institution address appears in the footer of the email.
     * @var string|null $institutionAddress public property
     */
    public $institutionAddress;

    /**
     * (Optional) Add a signature to the email.
     * @var array|null $signature public property
     */
    public $signature;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $to                 Initialization value for $this->to
     * @param string $from               Initialization value for $this->from
     * @param string $supportPhone       Initialization value for $this->supportPhone
     * @param string $subject            Initialization value for $this->subject
     * @param string $firstName          Initialization value for $this->firstName
     * @param string $institutionName    Initialization value for $this->institutionName
     * @param string $institutionAddress Initialization value for $this->institutionAddress
     * @param array  $signature          Initialization value for $this->signature
     */
    public function __construct()
    {
        if (8 == func_num_args()) {
            $this->to                 = func_get_arg(0);
            $this->from               = func_get_arg(1);
            $this->supportPhone       = func_get_arg(2);
            $this->subject            = func_get_arg(3);
            $this->firstName          = func_get_arg(4);
            $this->institutionName    = func_get_arg(5);
            $this->institutionAddress = func_get_arg(6);
            $this->signature          = func_get_arg(7);
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
        $json['to']                 = $this->to;
        $json['from']               = $this->from;
        $json['supportPhone']       = $this->supportPhone;
        $json['subject']            = $this->subject;
        $json['firstName']          = $this->firstName;
        $json['institutionName']    = $this->institutionName;
        $json['institutionAddress'] = $this->institutionAddress;
        $json['signature']          = $this->signature;

        return array_merge($json, $this->additionalProperties);
    }
}
