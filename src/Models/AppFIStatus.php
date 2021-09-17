<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The registration status fields for each specific OAuth financial institution
 */
class AppFIStatus implements JsonSerializable
{
    /**
     * The finicity financial institution id
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The applications abbreviated name
     * @var string|null $abbrvName public property
     */
    public $abbrvName;

    /**
     * Logo URL for stored logo file
     * @var string|null $logoUrl public property
     */
    public $logoUrl;

    /**
     * Status of decryption keys for financial institution app registration
     * @required
     * @var bool $decryptionKeyActivated public property
     */
    public $decryptionKeyActivated;

    /**
     * Creation date of app's financial institution registration
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * Last modified date of the app's financial institution registration
     * @required
     * @var integer $lastModifiedDate public property
     */
    public $lastModifiedDate;

    /**
     * App registered for specific FI what status is true. False indicates registration is still pending.
     * @required
     * @var bool $status public property
     */
    public $status;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                     Initialization value for $this->id
     * @param string  $abbrvName              Initialization value for $this->abbrvName
     * @param string  $logoUrl                Initialization value for $this->logoUrl
     * @param bool    $decryptionKeyActivated Initialization value for $this->decryptionKeyActivated
     * @param integer $createdDate            Initialization value for $this->createdDate
     * @param integer $lastModifiedDate       Initialization value for $this->lastModifiedDate
     * @param bool    $status                 Initialization value for $this->status
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->id                     = func_get_arg(0);
            $this->abbrvName              = func_get_arg(1);
            $this->logoUrl                = func_get_arg(2);
            $this->decryptionKeyActivated = func_get_arg(3);
            $this->createdDate            = func_get_arg(4);
            $this->lastModifiedDate       = func_get_arg(5);
            $this->status                 = func_get_arg(6);
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
        $json['abbrvName']              = $this->abbrvName;
        $json['logoUrl']                = $this->logoUrl;
        $json['decryptionKeyActivated'] = $this->decryptionKeyActivated;
        $json['createdDate']            = $this->createdDate;
        $json['lastModifiedDate']       = $this->lastModifiedDate;
        $json['status']                 = $this->status;

        return array_merge($json, $this->additionalProperties);
    }
}
