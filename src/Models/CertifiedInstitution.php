<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CertifiedInstitution implements JsonSerializable
{
    /**
     * Institution's name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Institution's Id
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * VOA Certification
     * @required
     * @var bool $voa public property
     */
    public $voa;

    /**
     * VOI Certification
     * @required
     * @var bool $voi public property
     */
    public $voi;

    /**
     * State Agg Certification
     * @required
     * @var bool $stateAgg public property
     */
    public $stateAgg;

    /**
     * ACH Certification
     * @required
     * @var bool $ach public property
     */
    public $ach;

    /**
     * Trans Agg Certification
     * @required
     * @var bool $transAgg public property
     */
    public $transAgg;

    /**
     * AHA Certification
     * @required
     * @var bool $aha public property
     */
    public $aha;

    /**
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\ChildInstitution[]|null $childInstitutions public property
     */
    public $childInstitutions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $name              Initialization value for $this->name
     * @param integer $id                Initialization value for $this->id
     * @param bool    $voa               Initialization value for $this->voa
     * @param bool    $voi               Initialization value for $this->voi
     * @param bool    $stateAgg          Initialization value for $this->stateAgg
     * @param bool    $ach               Initialization value for $this->ach
     * @param bool    $transAgg          Initialization value for $this->transAgg
     * @param bool    $aha               Initialization value for $this->aha
     * @param array   $childInstitutions Initialization value for $this->childInstitutions
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->name              = func_get_arg(0);
            $this->id                = func_get_arg(1);
            $this->voa               = func_get_arg(2);
            $this->voi               = func_get_arg(3);
            $this->stateAgg          = func_get_arg(4);
            $this->ach               = func_get_arg(5);
            $this->transAgg          = func_get_arg(6);
            $this->aha               = func_get_arg(7);
            $this->childInstitutions = func_get_arg(8);
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
        $json['name']              = $this->name;
        $json['id']                = $this->id;
        $json['voa']               = $this->voa;
        $json['voi']               = $this->voi;
        $json['stateAgg']          = $this->stateAgg;
        $json['ach']               = $this->ach;
        $json['transAgg']          = $this->transAgg;
        $json['aha']               = $this->aha;
        $json['childInstitutions'] = $this->childInstitutions;

        return array_merge($json, $this->additionalProperties);
    }
}
