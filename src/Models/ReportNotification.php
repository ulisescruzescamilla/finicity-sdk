<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class ReportNotification implements JsonSerializable
{
    /**
     * Finicity’s consumer ID. This field is optional and may not always return.
     * @var string|null $consumerId public property
     */
    public $consumerId;

    /**
     * The last four of the consumer’s social security number. This field is optional and may not always
     * return.
     * @var string|null $consumerSsn public property
     */
    public $consumerSsn;

    /**
     * The event name of the webhook. This will either be inProgress, failed, primaryFieldUpdate, or done.
     * @var string|null $eventName public property
     */
    public $eventName;

    /**
     * Finicity’s report ID
     * @var string|null $id public property
     */
    public $id;

    /**
     * inProgress, success, failure, or editing
     * @var string|null $status public property
     */
    public $status;

    /**
     * Finicity’s report type. This field is optional and may not always return.
     * @var string|null $type public property
     */
    public $type;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $consumerId  Initialization value for $this->consumerId
     * @param string $consumerSsn Initialization value for $this->consumerSsn
     * @param string $eventName   Initialization value for $this->eventName
     * @param string $id          Initialization value for $this->id
     * @param string $status      Initialization value for $this->status
     * @param string $type        Initialization value for $this->type
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->consumerId  = func_get_arg(0);
            $this->consumerSsn = func_get_arg(1);
            $this->eventName   = func_get_arg(2);
            $this->id          = func_get_arg(3);
            $this->status      = func_get_arg(4);
            $this->type        = func_get_arg(5);
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
        $json['consumerId']  = $this->consumerId;
        $json['consumerSsn'] = $this->consumerSsn;
        $json['eventName']   = $this->eventName;
        $json['id']          = $this->id;
        $json['status']      = $this->status;
        $json['type']        = $this->type;

        return array_merge($json, $this->additionalProperties);
    }
}
