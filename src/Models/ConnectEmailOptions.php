<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Customizable email details
 */
class ConnectEmailOptions implements JsonSerializable
{
    /**
     * The email address you wish to receive the email
     * @required
     * @var string $to public property
     */
    public $to;

    /**
     * Phone number that will be listed for support in the email. This field is optional. This is also
     * available in the Finicity Developer Portal.
     * @var string|null $supportPhone public property
     */
    public $supportPhone;

    /**
     * The “subject” line that will appear in user’s inboxes. Defaults to ‘Verify your Financial
     * Information’ This field is optional.
     * @var string|null $subject public property
     */
    public $subject;

    /**
     * The first name of the customer that will appear in the email This field is optional.
     * @var string|null $firstName public property
     */
    public $firstName;

    /**
     * The header color in the email. Defaults to dark blue This field is optional. This is also available
     * in the Finicity Developer Portal.
     * @var string|null $brandColor public property
     */
    public $brandColor;

    /**
     * A valid url that points to the logo you want to appear in the email. For optimal display, should
     * have dimensions no greater than 110 pixels tall and 300 pixels wide This field is optional. This is
     * also available in the Finicity Developer Portal.
     * @var string|null $brandLogo public property
     */
    public $brandLogo;

    /**
     * The name of your company that will appear in the email This field is optional. This is also
     * available in the Finicity Developer Portal.
     * @var string|null $institutionName public property
     */
    public $institutionName;

    /**
     * Address that will appear in the footer of the email This field is optional. This is also available
     * in the Finicity Developer Portal.
     * @var string|null $institutionAddress public property
     */
    public $institutionAddress;

    /**
     * Signature can be applied. In xml a separate line in signature is delineated by each tag. In json
     * this is simply an array, e.g. “signature”: This field is optional.
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
     * @param string $supportPhone       Initialization value for $this->supportPhone
     * @param string $subject            Initialization value for $this->subject
     * @param string $firstName          Initialization value for $this->firstName
     * @param string $brandColor         Initialization value for $this->brandColor
     * @param string $brandLogo          Initialization value for $this->brandLogo
     * @param string $institutionName    Initialization value for $this->institutionName
     * @param string $institutionAddress Initialization value for $this->institutionAddress
     * @param array  $signature          Initialization value for $this->signature
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->to                 = func_get_arg(0);
            $this->supportPhone       = func_get_arg(1);
            $this->subject            = func_get_arg(2);
            $this->firstName          = func_get_arg(3);
            $this->brandColor         = func_get_arg(4);
            $this->brandLogo          = func_get_arg(5);
            $this->institutionName    = func_get_arg(6);
            $this->institutionAddress = func_get_arg(7);
            $this->signature          = func_get_arg(8);
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
        $json['supportPhone']       = $this->supportPhone;
        $json['subject']            = $this->subject;
        $json['firstName']          = $this->firstName;
        $json['brandColor']         = $this->brandColor;
        $json['brandLogo']          = $this->brandLogo;
        $json['institutionName']    = $this->institutionName;
        $json['institutionAddress'] = $this->institutionAddress;
        $json['signature']          = $this->signature;

        return array_merge($json, $this->additionalProperties);
    }
}
