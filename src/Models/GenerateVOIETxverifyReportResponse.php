<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateVOIETxverifyReportResponse implements JsonSerializable
{
    /**
     * Finicity's report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Finicity ID for the customer
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * Finicity report consumer ID (max length 32 characters)
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * Last 4 digits of the report consumer’s Social Security number
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
     * Unique requestId for this specific call request
     * @required
     * @var string $requestId public property
     */
    public $requestId;

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
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\Error1[]|null $errors public property
     */
    public $errors;

    /**
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * The Report Listener URL to receive notifications (optional, must be URL-encoded).
     * @required
     * @var \FinicityAPILib\Models\Callback $callback public property
     */
    public $callback;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyConstraints $constraints public property
     */
    public $constraints;

    /**
     * @todo Write general description for this property
     * @var string|null $source public property
     */
    public $source;

    /**
     * Customer type
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Title of the report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * Finicity’s portfolio ID associated with the consumer on the report.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $reportStyle public property
     */
    public $reportStyle;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                  $id            Initialization value for $this->id
     * @param integer                 $customerId    Initialization value for $this->customerId
     * @param string                  $consumerId    Initialization value for $this->consumerId
     * @param string                  $consumerSsn   Initialization value for $this->consumerSsn
     * @param string                  $requesterName Initialization value for $this->requesterName
     * @param string                  $requestId     Initialization value for $this->requestId
     * @param string                  $type          Initialization value for $this->type
     * @param string                  $status        Initialization value for $this->status
     * @param array                   $errors        Initialization value for $this->errors
     * @param integer                 $createdDate   Initialization value for $this->createdDate
     * @param Callback                $callback      Initialization value for $this->callback
     * @param VOIETxverifyConstraints $constraints   Initialization value for $this->constraints
     * @param string                  $source        Initialization value for $this->source
     * @param string                  $customerType  Initialization value for $this->customerType
     * @param string                  $title         Initialization value for $this->title
     * @param string                  $portfolioId   Initialization value for $this->portfolioId
     * @param string                  $reportStyle   Initialization value for $this->reportStyle
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->customerId    = func_get_arg(1);
            $this->consumerId    = func_get_arg(2);
            $this->consumerSsn   = func_get_arg(3);
            $this->requesterName = func_get_arg(4);
            $this->requestId     = func_get_arg(5);
            $this->type          = func_get_arg(6);
            $this->status        = func_get_arg(7);
            $this->errors        = func_get_arg(8);
            $this->createdDate   = func_get_arg(9);
            $this->callback      = func_get_arg(10);
            $this->constraints   = func_get_arg(11);
            $this->source        = func_get_arg(12);
            $this->customerType  = func_get_arg(13);
            $this->title         = func_get_arg(14);
            $this->portfolioId   = func_get_arg(15);
            $this->reportStyle   = func_get_arg(16);
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
        $json['customerId']    = $this->customerId;
        $json['consumerId']    = $this->consumerId;
        $json['consumerSsn']   = $this->consumerSsn;
        $json['requesterName'] = $this->requesterName;
        $json['requestId']     = $this->requestId;
        $json['type']          = $this->type;
        $json['status']        = $this->status;
        $json['errors']        = $this->errors;
        $json['createdDate']   = $this->createdDate;
        $json['callback']      = $this->callback;
        $json['constraints']   = $this->constraints;
        $json['source']        = $this->source;
        $json['customerType']  = $this->customerType;
        $json['title']         = $this->title;
        $json['portfolioId']   = $this->portfolioId;
        $json['reportStyle']   = $this->reportStyle;

        return array_merge($json, $this->additionalProperties);
    }
}
