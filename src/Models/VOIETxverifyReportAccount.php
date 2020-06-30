<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOIETxverifyReportAccount implements JsonSerializable
{
    /**
     * The generated FInicity ID of the account
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The account number from the institution (all digits except the last four are obfuscated)
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * The name(s) of the account owner(s). This field is optional. If no owner information is available,
     * this field will not appear in the report.
     * @required
     * @var string $ownerName public property
     */
    public $ownerName;

    /**
     * The mailing address of the account owner(s). This field is optional. If no owner information is
     * available, this field will not appear in the report.
     * @required
     * @var string $ownerAddress public property
     */
    public $ownerAddress;

    /**
     * The account name from the institution
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * One of the values from Account Types
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the most recent aggregation attempt (see Handling Aggregation Status Codes)
     * @required
     * @var integer $aggregationStatusCode public property
     */
    public $aggregationStatusCode;

    /**
     * A list of income stream records
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyReportIncomeStream[] $incomeStreams public property
     */
    public $incomeStreams;

    /**
     * A list of miscellaneous deposits
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyReportTransaction[] $miscDeposits public property
     */
    public $miscDeposits;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id                    Initialization value for $this->id
     * @param string  $number                Initialization value for $this->number
     * @param string  $ownerName             Initialization value for $this->ownerName
     * @param string  $ownerAddress          Initialization value for $this->ownerAddress
     * @param string  $name                  Initialization value for $this->name
     * @param string  $type                  Initialization value for $this->type
     * @param integer $aggregationStatusCode Initialization value for $this->aggregationStatusCode
     * @param array   $incomeStreams         Initialization value for $this->incomeStreams
     * @param array   $miscDeposits          Initialization value for $this->miscDeposits
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->id                    = func_get_arg(0);
            $this->number                = func_get_arg(1);
            $this->ownerName             = func_get_arg(2);
            $this->ownerAddress          = func_get_arg(3);
            $this->name                  = func_get_arg(4);
            $this->type                  = func_get_arg(5);
            $this->aggregationStatusCode = func_get_arg(6);
            $this->incomeStreams         = func_get_arg(7);
            $this->miscDeposits          = func_get_arg(8);
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
        $json['id']                    = $this->id;
        $json['number']                = $this->number;
        $json['ownerName']             = $this->ownerName;
        $json['ownerAddress']          = $this->ownerAddress;
        $json['name']                  = $this->name;
        $json['type']                  = $this->type;
        $json['aggregationStatusCode'] = $this->aggregationStatusCode;
        $json['incomeStreams']         = $this->incomeStreams;
        $json['miscDeposits']          = $this->miscDeposits;

        return array_merge($json, $this->additionalProperties);
    }
}
