<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayStatementReportRecord implements JsonSerializable
{
    /**
     * Report id
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
     * @var \FinicityAPILib\Models\ErrorMessage[]|null $errors public property
     */
    public $errors;

    /**
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayStatementConstraints $constraints public property
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
     * Finicity’s portfolio ID associated with the consumer on the report.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $gseEnabled public property
     */
    public $gseEnabled;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $reportStyle public property
     */
    public $reportStyle;

    /**
     * Total number of billable pay statements included in the report
     * @required
     * @var integer $numberOfBillableAssets public property
     */
    public $numberOfBillableAssets;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $assetIds public property
     */
    public $assetIds;

    /**
     * Extracted pay statement details
     * @required
     * @maps payStatementTxVerifyDaoList
     * @var \FinicityAPILib\Models\VOIEPayStatement[] $payStatement_txverify_DaoList public property
     */
    public $payStatement_txverify_DaoList;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                  $id                            Initialization value for $this->id
     * @param integer                 $customerId                    Initialization value for $this->customerId
     * @param string                  $consumerId                    Initialization value for $this->consumerId
     * @param string                  $consumerSsn                   Initialization value for $this->consumerSsn
     * @param string                  $requesterName                 Initialization value for $this->requesterName
     * @param string                  $requestId                     Initialization value for $this->requestId
     * @param string                  $type                          Initialization value for $this->type
     * @param string                  $status                        Initialization value for $this->status
     * @param array                   $errors                        Initialization value for $this->errors
     * @param integer                 $createdDate                   Initialization value for $this->createdDate
     * @param PayStatementConstraints $constraints                   Initialization value for $this->constraints
     * @param string                  $source                        Initialization value for $this->source
     * @param string                  $customerType                  Initialization value for $this->customerType
     * @param string                  $title                         Initialization value for $this->title
     * @param integer                 $startDate                     Initialization value for $this->startDate
     * @param integer                 $endDate                       Initialization value for $this->endDate
     * @param string                  $portfolioId                   Initialization value for $this->portfolioId
     * @param bool                    $gseEnabled                    Initialization value for $this->gseEnabled
     * @param string                  $reportStyle                   Initialization value for $this->reportStyle
     * @param integer                 $numberOfBillableAssets        Initialization value for $this-
     *                                                                 >numberOfBillableAssets
     * @param array                   $assetIds                      Initialization value for $this->assetIds
     * @param array                   $payStatement_txverify_DaoList Initialization value for $this-
     *                                                                 >payStatement_txverify_DaoList
     */
    public function __construct()
    {
        if (22 == func_num_args()) {
            $this->id                            = func_get_arg(0);
            $this->customerId                    = func_get_arg(1);
            $this->consumerId                    = func_get_arg(2);
            $this->consumerSsn                   = func_get_arg(3);
            $this->requesterName                 = func_get_arg(4);
            $this->requestId                     = func_get_arg(5);
            $this->type                          = func_get_arg(6);
            $this->status                        = func_get_arg(7);
            $this->errors                        = func_get_arg(8);
            $this->createdDate                   = func_get_arg(9);
            $this->constraints                   = func_get_arg(10);
            $this->source                        = func_get_arg(11);
            $this->customerType                  = func_get_arg(12);
            $this->title                         = func_get_arg(13);
            $this->startDate                     = func_get_arg(14);
            $this->endDate                       = func_get_arg(15);
            $this->portfolioId                   = func_get_arg(16);
            $this->gseEnabled                    = func_get_arg(17);
            $this->reportStyle                   = func_get_arg(18);
            $this->numberOfBillableAssets        = func_get_arg(19);
            $this->assetIds                      = func_get_arg(20);
            $this->payStatement_txverify_DaoList = func_get_arg(21);
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
        $json['id']                          = $this->id;
        $json['customerId']                  = $this->customerId;
        $json['consumerId']                  = $this->consumerId;
        $json['consumerSsn']                 = $this->consumerSsn;
        $json['requesterName']               = $this->requesterName;
        $json['requestId']                   = $this->requestId;
        $json['type']                        = $this->type;
        $json['status']                      = $this->status;
        $json['errors']                      = $this->errors;
        $json['createdDate']                 = $this->createdDate;
        $json['constraints']                 = $this->constraints;
        $json['source']                      = $this->source;
        $json['customerType']                = $this->customerType;
        $json['title']                       = $this->title;
        $json['startDate']                   = $this->startDate;
        $json['endDate']                     = $this->endDate;
        $json['portfolioId']                 = $this->portfolioId;
        $json['gseEnabled']                  = $this->gseEnabled;
        $json['reportStyle']                 = $this->reportStyle;
        $json['numberOfBillableAssets']      = $this->numberOfBillableAssets;
        $json['assetIds']                    = $this->assetIds;
        $json['payStatementTxVerifyDaoList'] = $this->payStatement_txverify_DaoList;

        return array_merge($json, $this->additionalProperties);
    }
}
