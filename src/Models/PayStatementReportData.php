<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayStatementReportData implements JsonSerializable
{
    /**
     * The list of pay statement asset IDs.
     * @required
     * @var array $assetIds public property
     */
    public $assetIds;

    /**
     * Field to indicate whether to extract the earnings on all pay statements.
     * @var bool|null $extractEarnings public property
     */
    public $extractEarnings;

    /**
     * Field to indicate whether to extract the deductions on all pay statements.
     * @var bool|null $extractDeductions public property
     */
    public $extractDeductions;

    /**
     * Field to indicate whether to extract the direct deposits on all pay statements.
     * @var bool|null $extractDirectDeposit public property
     */
    public $extractDirectDeposit;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array $assetIds             Initialization value for $this->assetIds
     * @param bool  $extractEarnings      Initialization value for $this->extractEarnings
     * @param bool  $extractDeductions    Initialization value for $this->extractDeductions
     * @param bool  $extractDirectDeposit Initialization value for $this->extractDirectDeposit
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 4:
                $this->assetIds             = func_get_arg(0);
                $this->extractEarnings      = func_get_arg(1);
                $this->extractDeductions    = func_get_arg(2);
                $this->extractDirectDeposit = func_get_arg(3);
                break;

            default:
                $this->extractEarnings = true;
                $this->extractDeductions = false;
                $this->extractDirectDeposit = true;
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
        $json['assetIds']             = $this->assetIds;
        $json['extractEarnings']      = $this->extractEarnings;
        $json['extractDeductions']    = $this->extractDeductions;
        $json['extractDirectDeposit'] = $this->extractDirectDeposit;

        return array_merge($json, $this->additionalProperties);
    }
}
