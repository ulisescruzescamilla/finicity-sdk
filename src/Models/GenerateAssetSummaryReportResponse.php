<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateAssetSummaryReportResponse implements JsonSerializable
{
    /**
     * The Finicity report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * A unique identifier that will be consistent across all reports created for the same customer.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * Type of the customer
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Finicity's customer ID
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * Finicity indicator to track all activity associated with this report.
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
     * Finicity's title of the report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\ReportConstraints $constraints public property
     */
    public $constraints;

    /**
     * Type of the report
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
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\Error1[]|null $errors public property
     */
    public $errors;

    /**
     * @todo Write general description for this property
     * @var string|null $source public property
     */
    public $source;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string            $id            Initialization value for $this->id
     * @param string            $portfolioId   Initialization value for $this->portfolioId
     * @param string            $customerType  Initialization value for $this->customerType
     * @param integer           $customerId    Initialization value for $this->customerId
     * @param string            $requestId     Initialization value for $this->requestId
     * @param string            $requesterName Initialization value for $this->requesterName
     * @param integer           $createdDate   Initialization value for $this->createdDate
     * @param string            $title         Initialization value for $this->title
     * @param ReportConstraints $constraints   Initialization value for $this->constraints
     * @param string            $type          Initialization value for $this->type
     * @param string            $status        Initialization value for $this->status
     * @param array             $errors        Initialization value for $this->errors
     * @param string            $source        Initialization value for $this->source
     */
    public function __construct()
    {
        if (13 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->portfolioId   = func_get_arg(1);
            $this->customerType  = func_get_arg(2);
            $this->customerId    = func_get_arg(3);
            $this->requestId     = func_get_arg(4);
            $this->requesterName = func_get_arg(5);
            $this->createdDate   = func_get_arg(6);
            $this->title         = func_get_arg(7);
            $this->constraints   = func_get_arg(8);
            $this->type          = func_get_arg(9);
            $this->status        = func_get_arg(10);
            $this->errors        = func_get_arg(11);
            $this->source        = func_get_arg(12);
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
        $json['portfolioId']   = $this->portfolioId;
        $json['customerType']  = $this->customerType;
        $json['customerId']    = $this->customerId;
        $json['requestId']     = $this->requestId;
        $json['requesterName'] = $this->requesterName;
        $json['createdDate']   = $this->createdDate;
        $json['title']         = $this->title;
        $json['constraints']   = $this->constraints;
        $json['type']          = $this->type;
        $json['status']        = $this->status;
        $json['errors']        = $this->errors;
        $json['source']        = $this->source;

        return array_merge($json, $this->additionalProperties);
    }
}
