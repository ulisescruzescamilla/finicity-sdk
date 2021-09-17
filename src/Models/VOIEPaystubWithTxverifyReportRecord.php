<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOIEPaystubWithTxverifyReportRecord implements JsonSerializable
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
     * Finicity Internal Use Only
     * @required
     * @var bool $gseEnabled public property
     */
    public $gseEnabled;

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
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * @todo Write general description for this property
     * @var \FinicityAPILib\Models\ErrorMessage[]|null $errors public property
     */
    public $errors;

    /**
     * Title of the report
     * @required
     * @var string $title public property
     */
    public $title;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\VOIEPaystubWithTxverifyResponseConstraints $constraints public property
     */
    public $constraints;

    /**
     * Customer type
     * @required
     * @var string $customerType public property
     */
    public $customerType;

    /**
     * Finicity’s portfolio ID associated with the consumer on the report.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * Total number of billable pay statements included in the report
     * @required
     * @var integer $numberOfBillableAssets public property
     */
    public $numberOfBillableAssets;

    /**
     * One of the styles of VOIE: voieWithInterview, voieWithReport, voieWithStatement
     * @required
     * @var string $reportStyle public property
     */
    public $reportStyle;

    /**
     * The pay statements included in the report
     * @required
     * @var array $assetIds public property
     */
    public $assetIds;

    /**
     * Extracted pay statement details, and the transaction matching summary
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyPayStatement[] $payStatements public property
     */
    public $payStatements;

    /**
     * Details of the financial institution accounts included in the report
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyReportInstitution[] $institutions public property
     */
    public $institutions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                                     $id                     Initialization value for $this->id
     * @param integer                                    $customerId             Initialization value for $this-
     *                                                                             >customerId
     * @param bool                                       $gseEnabled             Initialization value for $this-
     *                                                                             >gseEnabled
     * @param string                                     $consumerId             Initialization value for $this-
     *                                                                             >consumerId
     * @param string                                     $consumerSsn            Initialization value for $this-
     *                                                                             >consumerSsn
     * @param string                                     $requesterName          Initialization value for $this-
     *                                                                             >requesterName
     * @param string                                     $requestId              Initialization value for $this-
     *                                                                             >requestId
     * @param string                                     $type                   Initialization value for $this->type
     * @param string                                     $status                 Initialization value for $this-
     *                                                                             >status
     * @param integer                                    $createdDate            Initialization value for $this-
     *                                                                             >createdDate
     * @param array                                      $errors                 Initialization value for $this-
     *                                                                             >errors
     * @param string                                     $title                  Initialization value for $this-
     *                                                                             >title
     * @param VOIEPaystubWithTxverifyResponseConstraints $constraints            Initialization value for $this-
     *                                                                             >constraints
     * @param string                                     $customerType           Initialization value for $this-
     *                                                                             >customerType
     * @param string                                     $portfolioId            Initialization value for $this-
     *                                                                             >portfolioId
     * @param integer                                    $numberOfBillableAssets Initialization value for $this-
     *                                                                             >numberOfBillableAssets
     * @param string                                     $reportStyle            Initialization value for $this-
     *                                                                             >reportStyle
     * @param array                                      $assetIds               Initialization value for $this-
     *                                                                             >assetIds
     * @param array                                      $payStatements          Initialization value for $this-
     *                                                                             >payStatements
     * @param array                                      $institutions           Initialization value for $this-
     *                                                                             >institutions
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 20:
                $this->id                     = func_get_arg(0);
                $this->customerId             = func_get_arg(1);
                $this->gseEnabled             = func_get_arg(2);
                $this->consumerId             = func_get_arg(3);
                $this->consumerSsn            = func_get_arg(4);
                $this->requesterName          = func_get_arg(5);
                $this->requestId              = func_get_arg(6);
                $this->type                   = func_get_arg(7);
                $this->status                 = func_get_arg(8);
                $this->createdDate            = func_get_arg(9);
                $this->errors                 = func_get_arg(10);
                $this->title                  = func_get_arg(11);
                $this->constraints            = func_get_arg(12);
                $this->customerType           = func_get_arg(13);
                $this->portfolioId            = func_get_arg(14);
                $this->numberOfBillableAssets = func_get_arg(15);
                $this->reportStyle            = func_get_arg(16);
                $this->assetIds               = func_get_arg(17);
                $this->payStatements          = func_get_arg(18);
                $this->institutions           = func_get_arg(19);
                break;

            default:
                $this->gseEnabled = true;
                break;
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
        $json['id']                     = $this->id;
        $json['customerId']             = $this->customerId;
        $json['gseEnabled']             = $this->gseEnabled;
        $json['consumerId']             = $this->consumerId;
        $json['consumerSsn']            = $this->consumerSsn;
        $json['requesterName']          = $this->requesterName;
        $json['requestId']              = $this->requestId;
        $json['type']                   = $this->type;
        $json['status']                 = $this->status;
        $json['createdDate']            = $this->createdDate;
        $json['errors']                 = $this->errors;
        $json['title']                  = $this->title;
        $json['constraints']            = $this->constraints;
        $json['customerType']           = $this->customerType;
        $json['portfolioId']            = $this->portfolioId;
        $json['numberOfBillableAssets'] = $this->numberOfBillableAssets;
        $json['reportStyle']            = $this->reportStyle;
        $json['assetIds']               = $this->assetIds;
        $json['payStatements']          = $this->payStatements;
        $json['institutions']           = $this->institutions;

        return array_merge($json, $this->additionalProperties);
    }
}
