<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CashFlowRecordPersonal implements JsonSerializable
{
    /**
     * The Finicity report ID (max length 32 characters)
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * GSE enabled
     * @required
     * @var bool $gseEnabled public property
     */
    public $gseEnabled;

    /**
     * The Finicity portfolio ID
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * `active` or `testing`
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Finicity customer ID
     * @required
     * @var string $customerId public property
     */
    public $customerId;

    /**
     * Finicity's request Id
     * @required
     * @var string $requestId public property
     */
    public $requestId;

    /**
     * “Finicity Cash Flow Report  - Personal”
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
     * Name of requester
     * @required
     * @var string $requesterName public property
     */
    public $requesterName;

    /**
     * `cfrp` or `cfrb`
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * `inProgress` or `success` or `failure`
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
     * The `postedDate` of the earliest transaction analyzed for this report
     * @required
     * @var integer $startDate public property
     */
    public $startDate;

    /**
     * The `postedDate` of the latest transaction analyzed for this report
     * @required
     * @var integer $endDate public property
     */
    public $endDate;

    /**
     * Number of days covered by the report
     * @required
     * @var string $days public property
     */
    public $days;

    /**
     * `true` if the report covers more than 365 days.
     * @required
     * @var bool $seasoned public property
     */
    public $seasoned;

    /**
     * A list of `institution` records, including information about the individual accounts used in this
     * report.
     * @required
     * @var \FinicityAPILib\Models\CashFlowInstitution[] $institutions public property
     */
    public $institutions;

    /**
     * A `cashFlowBalanceSummary` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashflowBalanceSummary $cashFlowBalanceSummary public property
     */
    public $cashFlowBalanceSummary;

    /**
     * A `cashFlowCreditSummary` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashFlowCreditSummary $cashFlowCreditSummary public property
     */
    public $cashFlowCreditSummary;

    /**
     * A `cashFlowDebitSummary` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashflowDebitSummary $cashFlowDebitSummary public property
     */
    public $cashFlowDebitSummary;

    /**
     * A `cashFlowCharacteristicsSummary` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowCashFlowCharacteristicsSummary $cashFlowCharacteristicsSummary public property
     */
    public $cashFlowCharacteristicsSummary;

    /**
     * A `possibleLoanDeposits` record
     * @required
     * @var \FinicityAPILib\Models\CashFlowPossibleLoanDeposits[] $possibleLoanDeposits public property
     */
    public $possibleLoanDeposits;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                                 $id                             Initialization value for $this-
     *                                                                                 >id
     * @param bool                                   $gseEnabled                     Initialization value for $this-
     *                                                                                 >gseEnabled
     * @param string                                 $portfolioId                    Initialization value for $this-
     *                                                                                 >portfolioId
     * @param string                                 $customerType                   Initialization value for $this-
     *                                                                                 >customerType
     * @param string                                 $customerId                     Initialization value for $this-
     *                                                                                 >customerId
     * @param string                                 $requestId                      Initialization value for $this-
     *                                                                                 >requestId
     * @param string                                 $title                          Initialization value for $this-
     *                                                                                 >title
     * @param string                                 $consumerId                     Initialization value for $this-
     *                                                                                 >consumerId
     * @param string                                 $consumerSsn                    Initialization value for $this-
     *                                                                                 >consumerSsn
     * @param string                                 $requesterName                  Initialization value for $this-
     *                                                                                 >requesterName
     * @param string                                 $type                           Initialization value for $this-
     *                                                                                 >type
     * @param string                                 $status                         Initialization value for $this-
     *                                                                                 >status
     * @param integer                                $createdDate                    Initialization value for $this-
     *                                                                                 >createdDate
     * @param integer                                $startDate                      Initialization value for $this-
     *                                                                                 >startDate
     * @param integer                                $endDate                        Initialization value for $this-
     *                                                                                 >endDate
     * @param string                                 $days                           Initialization value for $this-
     *                                                                                 >days
     * @param bool                                   $seasoned                       Initialization value for $this-
     *                                                                                 >seasoned
     * @param array                                  $institutions                   Initialization value for $this-
     *                                                                                 >institutions
     * @param CashFlowCashflowBalanceSummary         $cashFlowBalanceSummary         Initialization value for $this-
     *                                                                                 >cashFlowBalanceSummary
     * @param CashFlowCashFlowCreditSummary          $cashFlowCreditSummary          Initialization value for $this-
     *                                                                                 >cashFlowCreditSummary
     * @param CashFlowCashflowDebitSummary           $cashFlowDebitSummary           Initialization value for $this-
     *                                                                                 >cashFlowDebitSummary
     * @param CashFlowCashFlowCharacteristicsSummary $cashFlowCharacteristicsSummary Initialization value for $this-
     *                                                                                 >cashFlowCharacteristicsSummary
     * @param array                                  $possibleLoanDeposits           Initialization value for $this-
     *                                                                                 >possibleLoanDeposits
     */
    public function __construct()
    {
        if (23 == func_num_args()) {
            $this->id                             = func_get_arg(0);
            $this->gseEnabled                     = func_get_arg(1);
            $this->portfolioId                    = func_get_arg(2);
            $this->customerType                   = func_get_arg(3);
            $this->customerId                     = func_get_arg(4);
            $this->requestId                      = func_get_arg(5);
            $this->title                          = func_get_arg(6);
            $this->consumerId                     = func_get_arg(7);
            $this->consumerSsn                    = func_get_arg(8);
            $this->requesterName                  = func_get_arg(9);
            $this->type                           = func_get_arg(10);
            $this->status                         = func_get_arg(11);
            $this->createdDate                    = func_get_arg(12);
            $this->startDate                      = func_get_arg(13);
            $this->endDate                        = func_get_arg(14);
            $this->days                           = func_get_arg(15);
            $this->seasoned                       = func_get_arg(16);
            $this->institutions                   = func_get_arg(17);
            $this->cashFlowBalanceSummary         = func_get_arg(18);
            $this->cashFlowCreditSummary          = func_get_arg(19);
            $this->cashFlowDebitSummary           = func_get_arg(20);
            $this->cashFlowCharacteristicsSummary = func_get_arg(21);
            $this->possibleLoanDeposits           = func_get_arg(22);
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
        $json['id']                             = $this->id;
        $json['gseEnabled']                     = $this->gseEnabled;
        $json['portfolioId']                    = $this->portfolioId;
        $json['customerType']                   = $this->customerType;
        $json['customerId']                     = $this->customerId;
        $json['requestId']                      = $this->requestId;
        $json['title']                          = $this->title;
        $json['consumerId']                     = $this->consumerId;
        $json['consumerSsn']                    = $this->consumerSsn;
        $json['requesterName']                  = $this->requesterName;
        $json['type']                           = $this->type;
        $json['status']                         = $this->status;
        $json['createdDate']                    = $this->createdDate;
        $json['startDate']                      = $this->startDate;
        $json['endDate']                        = $this->endDate;
        $json['days']                           = $this->days;
        $json['seasoned']                       = $this->seasoned;
        $json['institutions']                   = $this->institutions;
        $json['cashFlowBalanceSummary']         = $this->cashFlowBalanceSummary;
        $json['cashFlowCreditSummary']          = $this->cashFlowCreditSummary;
        $json['cashFlowDebitSummary']           = $this->cashFlowDebitSummary;
        $json['cashFlowCharacteristicsSummary'] = $this->cashFlowCharacteristicsSummary;
        $json['possibleLoanDeposits']           = $this->possibleLoanDeposits;

        return array_merge($json, $this->additionalProperties);
    }
}
