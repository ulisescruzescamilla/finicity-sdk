<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *A list of Finicity financial institutions from the standard get institutions response
 */
class GetInstitutionsResponse implements JsonSerializable
{
    /**
     * Total number of results found
     * @required
     * @var integer $found public property
     */
    public $found;

    /**
     * Display the results count
     * @required
     * @var integer $displaying public property
     */
    public $displaying;

    /**
     * **True**: There are more institutions, matching the search parameters, that you can display.
     * @required
     * @var bool $moreAvailable public property
     */
    public $moreAvailable;

    /**
     * Date the request was created
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * An array of institutions
     * @required
     * @var \FinicityAPILib\Models\Institution[] $institutions public property
     */
    public $institutions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $found         Initialization value for $this->found
     * @param integer $displaying    Initialization value for $this->displaying
     * @param bool    $moreAvailable Initialization value for $this->moreAvailable
     * @param integer $createdDate   Initialization value for $this->createdDate
     * @param array   $institutions  Initialization value for $this->institutions
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->found         = func_get_arg(0);
            $this->displaying    = func_get_arg(1);
            $this->moreAvailable = func_get_arg(2);
            $this->createdDate   = func_get_arg(3);
            $this->institutions  = func_get_arg(4);
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
        $json['found']         = $this->found;
        $json['displaying']    = $this->displaying;
        $json['moreAvailable'] = $this->moreAvailable;
        $json['createdDate']   = $this->createdDate;
        $json['institutions']  = $this->institutions;

        return array_merge($json, $this->additionalProperties);
    }
}
