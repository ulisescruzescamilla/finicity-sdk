<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GenerateTransactionsReportResponse implements JsonSerializable
{
    /**
     * The reportId, to be passed to Get Report. (UUID with max length 12 characters)
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
     * active or testing
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * The customer ID.
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * Finicity’s request ID
     * @required
     * @var string $requestID public property
     */
    public $requestID;

    /**
     * Finicity’s name for the requester
     * @required
     * @var string $requesterName public property
     */
    public $requesterName;

    /**
     * The date the report was generated.
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * Finicity Transactions Report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * Finicity report consumer ID, from Create Report Consumer. (UUID with max length 32 characters)
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * The last four of the consumer’s social security
     * @required
     * @var string $consumerSsn public property
     */
    public $consumerSsn;

    /**
     * Specifies use of accountIds, reportCustomFields, includePending, fromDate, and toDate when creating
     * the report.
     * @required
     * @var \FinicityAPILib\Models\TransactionReportConstraints $constraints public property
     */
    public $constraints;

    /**
     * Report type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * inProgress, success
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\ErrorMessage[]|null $errors public property
     */
    public $errors;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                       $id            Initialization value for $this->id
     * @param string                       $portfolioId   Initialization value for $this->portfolioId
     * @param string                       $customerType  Initialization value for $this->customerType
     * @param integer                      $customerId    Initialization value for $this->customerId
     * @param string                       $requestID     Initialization value for $this->requestID
     * @param string                       $requesterName Initialization value for $this->requesterName
     * @param integer                      $createdDate   Initialization value for $this->createdDate
     * @param string                       $title         Initialization value for $this->title
     * @param string                       $consumerId    Initialization value for $this->consumerId
     * @param string                       $consumerSsn   Initialization value for $this->consumerSsn
     * @param TransactionReportConstraints $constraints   Initialization value for $this->constraints
     * @param string                       $type          Initialization value for $this->type
     * @param string                       $status        Initialization value for $this->status
     * @param array                        $errors        Initialization value for $this->errors
     */
    public function __construct()
    {
        if (14 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->portfolioId   = func_get_arg(1);
            $this->customerType  = func_get_arg(2);
            $this->customerId    = func_get_arg(3);
            $this->requestID     = func_get_arg(4);
            $this->requesterName = func_get_arg(5);
            $this->createdDate   = func_get_arg(6);
            $this->title         = func_get_arg(7);
            $this->consumerId    = func_get_arg(8);
            $this->consumerSsn   = func_get_arg(9);
            $this->constraints   = func_get_arg(10);
            $this->type          = func_get_arg(11);
            $this->status        = func_get_arg(12);
            $this->errors        = func_get_arg(13);
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
        $json['requestID']     = $this->requestID;
        $json['requesterName'] = $this->requesterName;
        $json['createdDate']   = $this->createdDate;
        $json['title']         = $this->title;
        $json['consumerId']    = $this->consumerId;
        $json['consumerSsn']   = $this->consumerSsn;
        $json['constraints']   = $this->constraints;
        $json['type']          = $this->type;
        $json['status']        = $this->status;
        $json['errors']        = $this->errors;

        return array_merge($json, $this->additionalProperties);
    }
}
