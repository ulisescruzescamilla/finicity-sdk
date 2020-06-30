<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *A financial institution's Finicity registered details
 */
class Institution implements JsonSerializable
{
    /**
     * Finicity’s institution ID
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The name of the institution
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * One of the values Banking, Investments, Credit Cards/Accounts, Workplace Retirement, Mortgages and
     * Loans, Insurance
     * @required
     * @var string $accountTypeDescription public property
     */
    public $accountTypeDescription;

    /**
     * The institution’s primary phone number
     * @var string|null $phone public property
     */
    public $phone;

    /**
     * The URL of the institution’s primary home page
     * @required
     * @var string $urlHomeApp public property
     */
    public $urlHomeApp;

    /**
     * The URL of the institution’s login page
     * @required
     * @var string $urlLogonApp public property
     */
    public $urlLogonApp;

    /**
     * Specifies if the institution is an OAuth institution
     * @required
     * @maps oauthEnabled
     * @var bool $oauth_Enabled public property
     */
    public $oauth_Enabled;

    /**
     * Institution's forgot password page
     * @var string|null $urlForgotPassword public property
     */
    public $urlForgotPassword;

    /**
     * Institution's signup page
     * @var string|null $urlOnlineRegistration public property
     */
    public $urlOnlineRegistration;

    /**
     * Institution's class
     * @maps class
     * @var string|null $mclass public property
     */
    public $mclass;

    /**
     * Special instructions given to customer for login
     * @var string|null $specialText public property
     */
    public $specialText;

    /**
     * Instructions given to customer before they are sent to the institution website to login for OAuth
     * insitutions. This is to help them give proper permission for data needed for the application.
     * @var array|null $specialInstructions public property
     */
    public $specialInstructions;

    /**
     * The address for the financial institution
     * @var \FinicityAPILib\Models\InstitutionAddress|null $address public property
     */
    public $address;

    /**
     * Institution's currency
     * @required
     * @var string $currency public property
     */
    public $currency;

    /**
     * The institution’s primary contact email
     * @var string|null $email public property
     */
    public $email;

    /**
     * Institution's status. Online, Offline, Maintenance
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The institution id of the OAuth institution that replaces this institution
     * @maps oauthInstitutionId
     * @var string|null $oauth_InstitutionId public property
     */
    public $oauth_InstitutionId;

    /**
     * The institution id of the institution that replaces this institution. Will be the same as
     * oauthInstitutionId and will eventually replace that field.
     * @var string|null $newInstitutionId public property
     */
    public $newInstitutionId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer            $id                     Initialization value for $this->id
     * @param string             $name                   Initialization value for $this->name
     * @param string             $accountTypeDescription Initialization value for $this->accountTypeDescription
     * @param string             $phone                  Initialization value for $this->phone
     * @param string             $urlHomeApp             Initialization value for $this->urlHomeApp
     * @param string             $urlLogonApp            Initialization value for $this->urlLogonApp
     * @param bool               $oauth_Enabled          Initialization value for $this->oauth_Enabled
     * @param string             $urlForgotPassword      Initialization value for $this->urlForgotPassword
     * @param string             $urlOnlineRegistration  Initialization value for $this->urlOnlineRegistration
     * @param string             $mclass                 Initialization value for $this->mclass
     * @param string             $specialText            Initialization value for $this->specialText
     * @param array              $specialInstructions    Initialization value for $this->specialInstructions
     * @param InstitutionAddress $address                Initialization value for $this->address
     * @param string             $currency               Initialization value for $this->currency
     * @param string             $email                  Initialization value for $this->email
     * @param string             $status                 Initialization value for $this->status
     * @param string             $oauth_InstitutionId    Initialization value for $this->oauth_InstitutionId
     * @param string             $newInstitutionId       Initialization value for $this->newInstitutionId
     */
    public function __construct()
    {
        if (18 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->name                   = func_get_arg(1);
            $this->accountTypeDescription = func_get_arg(2);
            $this->phone                  = func_get_arg(3);
            $this->urlHomeApp             = func_get_arg(4);
            $this->urlLogonApp            = func_get_arg(5);
            $this->oauth_Enabled          = func_get_arg(6);
            $this->urlForgotPassword      = func_get_arg(7);
            $this->urlOnlineRegistration  = func_get_arg(8);
            $this->mclass                 = func_get_arg(9);
            $this->specialText            = func_get_arg(10);
            $this->specialInstructions    = func_get_arg(11);
            $this->address                = func_get_arg(12);
            $this->currency               = func_get_arg(13);
            $this->email                  = func_get_arg(14);
            $this->status                 = func_get_arg(15);
            $this->oauth_InstitutionId    = func_get_arg(16);
            $this->newInstitutionId       = func_get_arg(17);
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
        $json['id']                     = $this->id;
        $json['name']                   = $this->name;
        $json['accountTypeDescription'] = $this->accountTypeDescription;
        $json['phone']                  = $this->phone;
        $json['urlHomeApp']             = $this->urlHomeApp;
        $json['urlLogonApp']            = $this->urlLogonApp;
        $json['oauthEnabled']           = $this->oauth_Enabled;
        $json['urlForgotPassword']      = $this->urlForgotPassword;
        $json['urlOnlineRegistration']  = $this->urlOnlineRegistration;
        $json['class']                  = $this->mclass;
        $json['specialText']            = $this->specialText;
        $json['specialInstructions']    = $this->specialInstructions;
        $json['address']                = $this->address;
        $json['currency']               = $this->currency;
        $json['email']                  = $this->email;
        $json['status']                 = $this->status;
        $json['oauthInstitutionId']     = $this->oauth_InstitutionId;
        $json['newInstitutionId']       = $this->newInstitutionId;

        return array_merge($json, $this->additionalProperties);
    }
}
