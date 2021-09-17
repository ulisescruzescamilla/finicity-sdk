<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOETransactionsReportRecord implements JsonSerializable
{
    /**
     * Finicity's report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Finicity’s portfolio ID associated with the consumer on the report.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * Finicity Internal Use Only
     * @required
     * @var bool $gseEnabled public property
     */
    public $gseEnabled;

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
     * Title of the report
     * @required
     * @var string $title public property
     */
    public $title;

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
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\VOETransactionsRequestConstraints|null $constraints public property
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
     * The postedDate of the earliest transaction analyzed for this report
     * @required
     * @var integer $startDate public property
     */
    public $startDate;

    /**
     * The postedDate of the latest transaction analyzed for this report
     * @required
     * @var integer $endDate public property
     */
    public $endDate;

    /**
     * Number of days covered by the report
     * @required
     * @var integer $days public property
     */
    public $days;

    /**
     * This will display true if the report covers more than 180 days
     * @required
     * @var bool $seasoned public property
     */
    public $seasoned;

    /**
     * A list of institution records, including information about the individual accounts used in this
     * report
     * @required
     * @var \FinicityAPILib\Models\VOETransactionsReportInstitution[] $institutions public property
     */
    public $institutions;

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
     * @param string                            $id            Initialization value for $this->id
     * @param string                            $portfolioId   Initialization value for $this->portfolioId
     * @param bool                              $gseEnabled    Initialization value for $this->gseEnabled
     * @param string                            $customerType  Initialization value for $this->customerType
     * @param integer                           $customerId    Initialization value for $this->customerId
     * @param string                            $requestId     Initialization value for $this->requestId
     * @param string                            $title         Initialization value for $this->title
     * @param string                            $consumerId    Initialization value for $this->consumerId
     * @param string                            $consumerSsn   Initialization value for $this->consumerSsn
     * @param string                            $requesterName Initialization value for $this->requesterName
     * @param VOETransactionsRequestConstraints $constraints   Initialization value for $this->constraints
     * @param string                            $type          Initialization value for $this->type
     * @param string                            $status        Initialization value for $this->status
     * @param integer                           $createdDate   Initialization value for $this->createdDate
     * @param integer                           $startDate     Initialization value for $this->startDate
     * @param integer                           $endDate       Initialization value for $this->endDate
     * @param integer                           $days          Initialization value for $this->days
     * @param bool                              $seasoned      Initialization value for $this->seasoned
     * @param array                             $institutions  Initialization value for $this->institutions
     * @param array                             $errors        Initialization value for $this->errors
     */
    public function __construct()
    {
        if (20 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->portfolioId   = func_get_arg(1);
            $this->gseEnabled    = func_get_arg(2);
            $this->customerType  = func_get_arg(3);
            $this->customerId    = func_get_arg(4);
            $this->requestId     = func_get_arg(5);
            $this->title         = func_get_arg(6);
            $this->consumerId    = func_get_arg(7);
            $this->consumerSsn   = func_get_arg(8);
            $this->requesterName = func_get_arg(9);
            $this->constraints   = func_get_arg(10);
            $this->type          = func_get_arg(11);
            $this->status        = func_get_arg(12);
            $this->createdDate   = func_get_arg(13);
            $this->startDate     = func_get_arg(14);
            $this->endDate       = func_get_arg(15);
            $this->days          = func_get_arg(16);
            $this->seasoned      = func_get_arg(17);
            $this->institutions  = func_get_arg(18);
            $this->errors        = func_get_arg(19);
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
        $json['gseEnabled']    = $this->gseEnabled;
        $json['customerType']  = $this->customerType;
        $json['customerId']    = $this->customerId;
        $json['requestId']     = $this->requestId;
        $json['title']         = $this->title;
        $json['consumerId']    = $this->consumerId;
        $json['consumerSsn']   = $this->consumerSsn;
        $json['requesterName'] = $this->requesterName;
        $json['constraints']   = $this->constraints;
        $json['type']          = $this->type;
        $json['status']        = $this->status;
        $json['createdDate']   = $this->createdDate;
        $json['startDate']     = $this->startDate;
        $json['endDate']       = $this->endDate;
        $json['days']          = $this->days;
        $json['seasoned']      = $this->seasoned;
        $json['institutions']  = $this->institutions;
        $json['errors']        = $this->errors;

        return array_merge($json, $this->additionalProperties);
    }
}
