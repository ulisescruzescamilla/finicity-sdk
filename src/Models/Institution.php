<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *A financial institution's Finicity registered details
 */
class Institution implements JsonSerializable
{
    /**
     * The institution’s ID
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The name of the institution
     * @var string|null $name public property
     */
    public $name;

    /**
     * **True**: The institution is certified for the VOA product. <br> <br> **False**: The institution is
     * decertified for the VOA product.
     * @required
     * @var bool $voa public property
     */
    public $voa;

    /**
     * **True**: The institution is certified for the VOI product. <br> <br> **False**: The institution is
     * decertified for the VOI product.
     * @required
     * @var bool $voi public property
     */
    public $voi;

    /**
     * **True**: The institution is certified for the Statement Aggregation product. <br> <br> **False**:
     * The institution is decertified for the Statement Aggregation product
     * @required
     * @var bool $stateAgg public property
     */
    public $stateAgg;

    /**
     * **True**: The institution is certified for the ACH product. <br> <br> **False**: The institution is
     * decertified for the ACH product.
     * @required
     * @var bool $ach public property
     */
    public $ach;

    /**
     * **True**: The institution is certified for the Transaction Aggregation product. <br> <br> **False**:
     * The institution is decertified for the Transaction Aggregation product
     * @required
     * @var bool $transAgg public property
     */
    public $transAgg;

    /**
     * **True**: The institution is certified for the Account History Aggregation product. <br> <br>
     * **False**: The institution is decertified for the Account History Aggregation product
     * @required
     * @var bool $aha public property
     */
    public $aha;

    /**
     * **Values**: Banking, Investments, Credit Cards/Accounts, Workplace Retirement, Mortgages and Loans,
     * Insurance
     * @var string|null $accountTypeDescription public property
     */
    public $accountTypeDescription;

    /**
     * The institution’s primary phone number
     * @var string|null $phone public property
     */
    public $phone;

    /**
     * The URL of the institution’s primary home page
     * @var string|null $urlHomeApp public property
     */
    public $urlHomeApp;

    /**
     * The URL of the institution’s login page
     * @var string|null $urlLogonApp public property
     */
    public $urlLogonApp;

    /**
     * **True**: The institution is an OAuth connection.
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
     * Instructions given to the customer before they are sent to the institution website to login for
     * OAuth institutions. <br> <br> **Note** This helps the customer to provide the proper permission for
     * data needed for the application.
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
     * Institution's status. Online, Offline, Maintenance, Testing
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The new id for the financial institution’s ID you are replacing. <br> <br> **Note**: This is the
     * same as the oauthInstitutionId field which will eventually be replaced by this field.
     * @var integer|null $newInstitutionId public property
     */
    public $newInstitutionId;

    /**
     * The branding associated with the institution
     * @var \FinicityAPILib\Models\GetInstitutionsInstitutionBranding|null $branding public property
     */
    public $branding;

    /**
     * The new ID for the OAuth institution’s ID you are replacing.
     * @maps oauthInstitutionId
     * @var integer|null $oauth_InstitutionId public property
     */
    public $oauth_InstitutionId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer                            $id                     Initialization value for $this->id
     * @param string                             $name                   Initialization value for $this->name
     * @param bool                               $voa                    Initialization value for $this->voa
     * @param bool                               $voi                    Initialization value for $this->voi
     * @param bool                               $stateAgg               Initialization value for $this->stateAgg
     * @param bool                               $ach                    Initialization value for $this->ach
     * @param bool                               $transAgg               Initialization value for $this->transAgg
     * @param bool                               $aha                    Initialization value for $this->aha
     * @param string                             $accountTypeDescription Initialization value for $this-
     *                                                                     >accountTypeDescription
     * @param string                             $phone                  Initialization value for $this->phone
     * @param string                             $urlHomeApp             Initialization value for $this->urlHomeApp
     * @param string                             $urlLogonApp            Initialization value for $this->urlLogonApp
     * @param bool                               $oauth_Enabled          Initialization value for $this-
     *                                                                     >oauth_Enabled
     * @param string                             $urlForgotPassword      Initialization value for $this-
     *                                                                     >urlForgotPassword
     * @param string                             $urlOnlineRegistration  Initialization value for $this-
     *                                                                     >urlOnlineRegistration
     * @param string                             $mclass                 Initialization value for $this->mclass
     * @param string                             $specialText            Initialization value for $this->specialText
     * @param array                              $specialInstructions    Initialization value for $this-
     *                                                                     >specialInstructions
     * @param InstitutionAddress                 $address                Initialization value for $this->address
     * @param string                             $currency               Initialization value for $this->currency
     * @param string                             $email                  Initialization value for $this->email
     * @param string                             $status                 Initialization value for $this->status
     * @param integer                            $newInstitutionId       Initialization value for $this-
     *                                                                     >newInstitutionId
     * @param GetInstitutionsInstitutionBranding $branding               Initialization value for $this->branding
     * @param integer                            $oauth_InstitutionId    Initialization value for $this-
     *                                                                     >oauth_InstitutionId
     */
    public function __construct()
    {
        if (25 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->name                   = func_get_arg(1);
            $this->voa                    = func_get_arg(2);
            $this->voi                    = func_get_arg(3);
            $this->stateAgg               = func_get_arg(4);
            $this->ach                    = func_get_arg(5);
            $this->transAgg               = func_get_arg(6);
            $this->aha                    = func_get_arg(7);
            $this->accountTypeDescription = func_get_arg(8);
            $this->phone                  = func_get_arg(9);
            $this->urlHomeApp             = func_get_arg(10);
            $this->urlLogonApp            = func_get_arg(11);
            $this->oauth_Enabled          = func_get_arg(12);
            $this->urlForgotPassword      = func_get_arg(13);
            $this->urlOnlineRegistration  = func_get_arg(14);
            $this->mclass                 = func_get_arg(15);
            $this->specialText            = func_get_arg(16);
            $this->specialInstructions    = func_get_arg(17);
            $this->address                = func_get_arg(18);
            $this->currency               = func_get_arg(19);
            $this->email                  = func_get_arg(20);
            $this->status                 = func_get_arg(21);
            $this->newInstitutionId       = func_get_arg(22);
            $this->branding               = func_get_arg(23);
            $this->oauth_InstitutionId    = func_get_arg(24);
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
        $json['voa']                    = $this->voa;
        $json['voi']                    = $this->voi;
        $json['stateAgg']               = $this->stateAgg;
        $json['ach']                    = $this->ach;
        $json['transAgg']               = $this->transAgg;
        $json['aha']                    = $this->aha;
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
        $json['newInstitutionId']       = $this->newInstitutionId;
        $json['branding']               = $this->branding;
        $json['oauthInstitutionId']     = $this->oauth_InstitutionId;

        return array_merge($json, $this->additionalProperties);
    }
}
