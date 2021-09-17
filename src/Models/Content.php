<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Content implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $reseller public property
     */
    public $reseller;

    /**
     * @todo Write general description for this property
     * @var string|null $resellerProvider public property
     */
    public $resellerProvider;

    /**
     * @todo Write general description for this property
     * @var string|null $platformProvider public property
     */
    public $platformProvider;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $consumerId public property
     */
    public $consumerId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $consumerSsn public property
     */
    public $consumerSsn;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $firstName public property
     */
    public $firstName;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $lastName public property
     */
    public $lastName;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $lastFourReportId public property
     */
    public $lastFourReportId;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $reportType public property
     */
    public $reportType;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\ReportCustomField1[] $reportCustomFields public property
     */
    public $reportCustomFields;

    /**
     * @todo Write general description for this property
     * @var string|null $status public property
     */
    public $status;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $reseller           Initialization value for $this->reseller
     * @param string  $resellerProvider   Initialization value for $this->resellerProvider
     * @param string  $platformProvider   Initialization value for $this->platformProvider
     * @param integer $customerId         Initialization value for $this->customerId
     * @param string  $consumerId         Initialization value for $this->consumerId
     * @param string  $consumerSsn        Initialization value for $this->consumerSsn
     * @param string  $firstName          Initialization value for $this->firstName
     * @param string  $lastName           Initialization value for $this->lastName
     * @param string  $lastFourReportId   Initialization value for $this->lastFourReportId
     * @param integer $createdDate        Initialization value for $this->createdDate
     * @param string  $reportType         Initialization value for $this->reportType
     * @param array   $reportCustomFields Initialization value for $this->reportCustomFields
     * @param string  $status             Initialization value for $this->status
     */
    public function __construct()
    {
        if (13 == func_num_args()) {
            $this->reseller           = func_get_arg(0);
            $this->resellerProvider   = func_get_arg(1);
            $this->platformProvider   = func_get_arg(2);
            $this->customerId         = func_get_arg(3);
            $this->consumerId         = func_get_arg(4);
            $this->consumerSsn        = func_get_arg(5);
            $this->firstName          = func_get_arg(6);
            $this->lastName           = func_get_arg(7);
            $this->lastFourReportId   = func_get_arg(8);
            $this->createdDate        = func_get_arg(9);
            $this->reportType         = func_get_arg(10);
            $this->reportCustomFields = func_get_arg(11);
            $this->status             = func_get_arg(12);
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
        $json['reseller']           = $this->reseller;
        $json['resellerProvider']   = $this->resellerProvider;
        $json['platformProvider']   = $this->platformProvider;
        $json['customerId']         = $this->customerId;
        $json['consumerId']         = $this->consumerId;
        $json['consumerSsn']        = $this->consumerSsn;
        $json['firstName']          = $this->firstName;
        $json['lastName']           = $this->lastName;
        $json['lastFourReportId']   = $this->lastFourReportId;
        $json['createdDate']        = $this->createdDate;
        $json['reportType']         = $this->reportType;
        $json['reportCustomFields'] = $this->reportCustomFields;
        $json['status']             = $this->status;

        return array_merge($json, $this->additionalProperties);
    }
}
