<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The fields used for the Transaction History Report (CRA products).
 */
class TransactionsReportRecord implements JsonSerializable
{
    /**
     * The Finicity report ID (max 32 characters)
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Finicity Transactions Report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * active or testing
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Finicity customer ID
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * Finicity report consumer ID (max length 32 characters).
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * Last 4 digits of the report consumer’s Social Security number.
     * @required
     * @var string $consumerSsn public property
     */
    public $consumerSsn;

    /**
     * Report type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * inProgress or success or failure.
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The date the report was generated.
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * Specifies use of accountIds, reportCustomFields, includePending, fromDate, and toDate when creating
     * the report.
     * @required
     * @var \FinicityAPILib\Models\TransactionReportConstraints $constraints public property
     */
    public $constraints;

    /**
     * The postedDate of the earliest transaction analyzed for this report.
     * @required
     * @var integer $startDate public property
     */
    public $startDate;

    /**
     * The postedDate of the latest transaction analyzed for this report.
     * @required
     * @var integer $endDate public property
     */
    public $endDate;

    /**
     * Number of days covered by the report.
     * @required
     * @var integer $days public property
     */
    public $days;

    /**
     * true: if the report covers more than 365 days.
     * @required
     * @var bool $seasoned public property
     */
    public $seasoned;

    /**
     * Finicity internal use only.
     * @required
     * @var bool $gseEnabled public property
     */
    public $gseEnabled;

    /**
     * Finicity’s portfolio ID associated with the consumer on the report.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * A list of institution records, including information about the individual accounts used in this
     * report. See the Institution Record structure.
     * @required
     * @var \FinicityAPILib\Models\TransactionsReportInstitution[] $institutions public property
     */
    public $institutions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                       $id           Initialization value for $this->id
     * @param string                       $title        Initialization value for $this->title
     * @param string                       $customerType Initialization value for $this->customerType
     * @param integer                      $customerId   Initialization value for $this->customerId
     * @param string                       $consumerId   Initialization value for $this->consumerId
     * @param string                       $consumerSsn  Initialization value for $this->consumerSsn
     * @param string                       $type         Initialization value for $this->type
     * @param string                       $status       Initialization value for $this->status
     * @param integer                      $createdDate  Initialization value for $this->createdDate
     * @param TransactionReportConstraints $constraints  Initialization value for $this->constraints
     * @param integer                      $startDate    Initialization value for $this->startDate
     * @param integer                      $endDate      Initialization value for $this->endDate
     * @param integer                      $days         Initialization value for $this->days
     * @param bool                         $seasoned     Initialization value for $this->seasoned
     * @param bool                         $gseEnabled   Initialization value for $this->gseEnabled
     * @param string                       $portfolioId  Initialization value for $this->portfolioId
     * @param array                        $institutions Initialization value for $this->institutions
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
            $this->id           = func_get_arg(0);
            $this->title        = func_get_arg(1);
            $this->customerType = func_get_arg(2);
            $this->customerId   = func_get_arg(3);
            $this->consumerId   = func_get_arg(4);
            $this->consumerSsn  = func_get_arg(5);
            $this->type         = func_get_arg(6);
            $this->status       = func_get_arg(7);
            $this->createdDate  = func_get_arg(8);
            $this->constraints  = func_get_arg(9);
            $this->startDate    = func_get_arg(10);
            $this->endDate      = func_get_arg(11);
            $this->days         = func_get_arg(12);
            $this->seasoned     = func_get_arg(13);
            $this->gseEnabled   = func_get_arg(14);
            $this->portfolioId  = func_get_arg(15);
            $this->institutions = func_get_arg(16);
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
        $json['id']           = $this->id;
        $json['title']        = $this->title;
        $json['customerType'] = $this->customerType;
        $json['customerId']   = $this->customerId;
        $json['consumerId']   = $this->consumerId;
        $json['consumerSsn']  = $this->consumerSsn;
        $json['type']         = $this->type;
        $json['status']       = $this->status;
        $json['createdDate']  = $this->createdDate;
        $json['constraints']  = $this->constraints;
        $json['startDate']    = $this->startDate;
        $json['endDate']      = $this->endDate;
        $json['days']         = $this->days;
        $json['seasoned']     = $this->seasoned;
        $json['gseEnabled']   = $this->gseEnabled;
        $json['portfolioId']  = $this->portfolioId;
        $json['institutions'] = $this->institutions;

        return array_merge($json, $this->additionalProperties);
    }
}
