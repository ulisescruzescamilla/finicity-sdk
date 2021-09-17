<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class AppRegistrationRequest implements JsonSerializable
{
    /**
     * A short description of the app
     * @required
     * @var string $appDescription public property
     */
    public $appDescription;

    /**
     * App Name. This will be visible to end users in the FI interface.
     * @required
     * @var string $appName public property
     */
    public $appName;

    /**
     * App URL
     * @required
     * @var string $appUrl public property
     */
    public $appUrl;

    /**
     * Address Line 1 for business entity that owns the app. Information for registration purposes only and
     * not given to the end user.
     * @required
     * @var string $ownerAddressLine1 public property
     */
    public $ownerAddressLine1;

    /**
     * Address Line 2 for business entity that owns the app. Information for registration purposes only and
     * not given to the end user.
     * @required
     * @var string $ownerAddressLine2 public property
     */
    public $ownerAddressLine2;

    /**
     * City for business entity that owns the app. Information for registration purposes only and not given
     * to the end user.
     * @required
     * @var string $ownerCity public property
     */
    public $ownerCity;

    /**
     * Country  for business entity that owns the app. Information for registration purposes only and not
     * given to the end user.
     * @required
     * @var string $ownerCountry public property
     */
    public $ownerCountry;

    /**
     * Business name for business entity that owns the app. Information for registration purposes only and
     * not given to the end user.
     * @required
     * @var string $ownerName public property
     */
    public $ownerName;

    /**
     * Zip code for business entity that owns the app. Information for registration purposes only and not
     * given to the end user.
     * @required
     * @var string $ownerPostalCode public property
     */
    public $ownerPostalCode;

    /**
     * State for business entity that owns the app. Information for registration purposes only and not
     * given to the end user.
     * @required
     * @var string $ownerState public property
     */
    public $ownerState;

    /**
     * App Logo. The base 64 encoded value for the logo. 1:1 .svg file less than 50 KB
     * @required
     * @var string $image public property
     */
    public $image;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $appDescription    Initialization value for $this->appDescription
     * @param string $appName           Initialization value for $this->appName
     * @param string $appUrl            Initialization value for $this->appUrl
     * @param string $ownerAddressLine1 Initialization value for $this->ownerAddressLine1
     * @param string $ownerAddressLine2 Initialization value for $this->ownerAddressLine2
     * @param string $ownerCity         Initialization value for $this->ownerCity
     * @param string $ownerCountry      Initialization value for $this->ownerCountry
     * @param string $ownerName         Initialization value for $this->ownerName
     * @param string $ownerPostalCode   Initialization value for $this->ownerPostalCode
     * @param string $ownerState        Initialization value for $this->ownerState
     * @param string $image             Initialization value for $this->image
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->appDescription    = func_get_arg(0);
            $this->appName           = func_get_arg(1);
            $this->appUrl            = func_get_arg(2);
            $this->ownerAddressLine1 = func_get_arg(3);
            $this->ownerAddressLine2 = func_get_arg(4);
            $this->ownerCity         = func_get_arg(5);
            $this->ownerCountry      = func_get_arg(6);
            $this->ownerName         = func_get_arg(7);
            $this->ownerPostalCode   = func_get_arg(8);
            $this->ownerState        = func_get_arg(9);
            $this->image             = func_get_arg(10);
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
        $json['appDescription']    = $this->appDescription;
        $json['appName']           = $this->appName;
        $json['appUrl']            = $this->appUrl;
        $json['ownerAddressLine1'] = $this->ownerAddressLine1;
        $json['ownerAddressLine2'] = $this->ownerAddressLine2;
        $json['ownerCity']         = $this->ownerCity;
        $json['ownerCountry']      = $this->ownerCountry;
        $json['ownerName']         = $this->ownerName;
        $json['ownerPostalCode']   = $this->ownerPostalCode;
        $json['ownerState']        = $this->ownerState;
        $json['image']             = $this->image;

        return array_merge($json, $this->additionalProperties);
    }
}
