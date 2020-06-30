<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ReportSummary implements JsonSerializable
{
    /**
     * The Finicity report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Finicity ID for the consumer
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * Last 4 digits of the report consumer's Social Security number
     * @required
     * @var string $consumerSsn public property
     */
    public $consumerSsn;

    /**
     * Name of Finicity partner requesting the report
     * @required
     * @var string $requesterName public property
     */
    public $requesterName;

    /**
     * The unique requestId for this specific call request
     * @required
     * @var string $requestId public property
     */
    public $requestId;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\ReportConstraints $constraints public property
     */
    public $constraints;

    /**
     * Report type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * inProgress, success, or failure
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string            $id            Initialization value for $this->id
     * @param string            $consumerId    Initialization value for $this->consumerId
     * @param string            $consumerSsn   Initialization value for $this->consumerSsn
     * @param string            $requesterName Initialization value for $this->requesterName
     * @param string            $requestId     Initialization value for $this->requestId
     * @param ReportConstraints $constraints   Initialization value for $this->constraints
     * @param string            $type          Initialization value for $this->type
     * @param string            $status        Initialization value for $this->status
     * @param integer           $createdDate   Initialization value for $this->createdDate
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->consumerId    = func_get_arg(1);
            $this->consumerSsn   = func_get_arg(2);
            $this->requesterName = func_get_arg(3);
            $this->requestId     = func_get_arg(4);
            $this->constraints   = func_get_arg(5);
            $this->type          = func_get_arg(6);
            $this->status        = func_get_arg(7);
            $this->createdDate   = func_get_arg(8);
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
        $json['id']            = $this->id;
        $json['consumerId']    = $this->consumerId;
        $json['consumerSsn']   = $this->consumerSsn;
        $json['requesterName'] = $this->requesterName;
        $json['requestId']     = $this->requestId;
        $json['constraints']   = $this->constraints;
        $json['type']          = $this->type;
        $json['status']        = $this->status;
        $json['createdDate']   = $this->createdDate;

        return array_merge($json, $this->additionalProperties);
    }
}
