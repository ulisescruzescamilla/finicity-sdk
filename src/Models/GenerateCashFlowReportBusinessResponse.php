<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateCashFlowReportBusinessResponse implements JsonSerializable
{
    /**
     * Finicity's report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Customer type
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Finicity ID for the customer
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * Unique requestId for this specific call request
     * @required
     * @var string $requestId public property
     */
    public $requestId;

    /**
     * Name of Finicity partner requesting the report
     * @required
     * @var string $requesterName public property
     */
    public $requesterName;

    /**
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * Title of the report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\RequestConstraints $constraints public property
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
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string             $id            Initialization value for $this->id
     * @param string             $customerType  Initialization value for $this->customerType
     * @param integer            $customerId    Initialization value for $this->customerId
     * @param string             $requestId     Initialization value for $this->requestId
     * @param string             $requesterName Initialization value for $this->requesterName
     * @param integer            $createdDate   Initialization value for $this->createdDate
     * @param string             $title         Initialization value for $this->title
     * @param RequestConstraints $constraints   Initialization value for $this->constraints
     * @param string             $type          Initialization value for $this->type
     * @param string             $status        Initialization value for $this->status
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->customerType  = func_get_arg(1);
            $this->customerId    = func_get_arg(2);
            $this->requestId     = func_get_arg(3);
            $this->requesterName = func_get_arg(4);
            $this->createdDate   = func_get_arg(5);
            $this->title         = func_get_arg(6);
            $this->constraints   = func_get_arg(7);
            $this->type          = func_get_arg(8);
            $this->status        = func_get_arg(9);
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
        $json['customerType']  = $this->customerType;
        $json['customerId']    = $this->customerId;
        $json['requestId']     = $this->requestId;
        $json['requesterName'] = $this->requesterName;
        $json['createdDate']   = $this->createdDate;
        $json['title']         = $this->title;
        $json['constraints']   = $this->constraints;
        $json['type']          = $this->type;
        $json['status']        = $this->status;

        return array_merge($json, $this->additionalProperties);
    }
}
