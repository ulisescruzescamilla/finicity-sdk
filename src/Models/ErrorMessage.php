<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ErrorMessage implements JsonSerializable
{
    /**
     * Error code
     * @required
     * @var integer $code public property
     */
    public $code;

    /**
     * Error message
     * @var string|null $message public property
     */
    public $message;

    /**
     * Finicity's asset ID
     * @var string|null $assetId public property
     */
    public $assetId;

    /**
     * The generated Finicity ID of the account that had the error
     * @var integer|null $accountId public property
     */
    public $accountId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $code      Initialization value for $this->code
     * @param string  $message   Initialization value for $this->message
     * @param string  $assetId   Initialization value for $this->assetId
     * @param integer $accountId Initialization value for $this->accountId
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->code      = func_get_arg(0);
            $this->message   = func_get_arg(1);
            $this->assetId   = func_get_arg(2);
            $this->accountId = func_get_arg(3);
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
        $json['code']      = $this->code;
        $json['message']   = $this->message;
        $json['assetId']   = $this->assetId;
        $json['accountId'] = $this->accountId;

        return array_merge($json, $this->additionalProperties);
    }
}
