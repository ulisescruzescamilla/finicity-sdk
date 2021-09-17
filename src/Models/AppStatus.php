<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The registration status fields for the application. This is version 2 of this object.
 */
class AppStatus implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * An identifier to track the application registration request
     * @required
     * @var integer $preAppId public property
     */
    public $preAppId;

    /**
     * A note on registration. Typically used to indicate reasons for rejected apps.
     * @var string|null $note public property
     */
    public $note;

    /**
     * The official applicationId to be used in customer creation and setting customer application Id
     * services. This is populated after the app is in A status for approved.
     * @var string|null $applicationId public property
     */
    public $applicationId;

    /**
     * The App Name submitted during registration
     * @required
     * @var string $appName public property
     */
    public $appName;

    /**
     * A timestamp showing when the registration was submitted (see Handling Dates and Times)
     * @required
     * @var integer $submittedDate public property
     */
    public $submittedDate;

    /**
     * A timestamp showing when the registration was last modified. Typically when it was approved or
     * rejected. (see Handling Dates and Times)
     * @required
     * @var integer $modifiedDate public property
     */
    public $modifiedDate;

    /**
     * The status of the app registration request. A means approved. P means pending which is the status
     * when initially submitted or when the app is modified and awaiting approval. R means rejected. If it
     * is rejected there will be a note with the rejected reason.
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Indicates scopes of data accessible to the app
     * @var string|null $scopes public property
     */
    public $scopes;

    /**
     * A list of the registration status for each FI for the application
     * @var \FinicityAPILib\Models\AppFIStatus[]|null $institutionDetails public property
     */
    public $institutionDetails;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $partnerId          Initialization value for $this->partnerId
     * @param integer $preAppId           Initialization value for $this->preAppId
     * @param string  $note               Initialization value for $this->note
     * @param string  $applicationId      Initialization value for $this->applicationId
     * @param string  $appName            Initialization value for $this->appName
     * @param integer $submittedDate      Initialization value for $this->submittedDate
     * @param integer $modifiedDate       Initialization value for $this->modifiedDate
     * @param string  $status             Initialization value for $this->status
     * @param string  $scopes             Initialization value for $this->scopes
     * @param array   $institutionDetails Initialization value for $this->institutionDetails
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->partnerId          = func_get_arg(0);
            $this->preAppId           = func_get_arg(1);
            $this->note               = func_get_arg(2);
            $this->applicationId      = func_get_arg(3);
            $this->appName            = func_get_arg(4);
            $this->submittedDate      = func_get_arg(5);
            $this->modifiedDate       = func_get_arg(6);
            $this->status             = func_get_arg(7);
            $this->scopes             = func_get_arg(8);
            $this->institutionDetails = func_get_arg(9);
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
        $json['partnerId']          = $this->partnerId;
        $json['preAppId']           = $this->preAppId;
        $json['note']               = $this->note;
        $json['applicationId']      = $this->applicationId;
        $json['appName']            = $this->appName;
        $json['submittedDate']      = $this->submittedDate;
        $json['modifiedDate']       = $this->modifiedDate;
        $json['status']             = $this->status;
        $json['scopes']             = $this->scopes;
        $json['institutionDetails'] = $this->institutionDetails;

        return array_merge($json, $this->additionalProperties);
    }
}
