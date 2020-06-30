<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ChildInstitution implements JsonSerializable
{
    /**
     * The RSSD ID is a unique identifier assigned to financial institutions by the Federal Reserve. While
     * the length of the RSSD ID varies by institution, it cannot exceed 10 numerical digits
     * @required
     * @var integer $rssd public property
     */
    public $rssd;

    /**
     * The RSSD ID is a unique identifier assigned to financial institutions by the Federal Reserve. While
     * the length of the RSSD ID varies by institution, it cannot exceed 10 numerical digits
     * @required
     * @var integer $parentRSSD public property
     */
    public $parentRSSD;

    /**
     * The name of the institution
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Finicity’s institution ID
     * @required
     * @var integer $institutionId public property
     */
    public $institutionId;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $rssd          Initialization value for $this->rssd
     * @param integer $parentRSSD    Initialization value for $this->parentRSSD
     * @param string  $name          Initialization value for $this->name
     * @param integer $institutionId Initialization value for $this->institutionId
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->rssd          = func_get_arg(0);
            $this->parentRSSD    = func_get_arg(1);
            $this->name          = func_get_arg(2);
            $this->institutionId = func_get_arg(3);
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
        $json['rssd']          = $this->rssd;
        $json['parentRSSD']    = $this->parentRSSD;
        $json['name']          = $this->name;
        $json['institutionId'] = $this->institutionId;

        return array_merge($json, $this->additionalProperties);
    }
}
