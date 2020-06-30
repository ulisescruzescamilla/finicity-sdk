<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class StorePayStatementRequest implements JsonSerializable
{
    /**
     * The label to be associated with the pay statement. These are recommended labels:  lastPayPeriod -
     * The most recent (last) pay statement. This label will allow the paystub to go through primary data
     * extraction.  lastPayPeriodMinusOne- The second most recent pay statement lastPayPeriodMinusTwo - The
     * third most recent pay statement previousYearLastPayPeriod - Last pay statement of the previous
     * calendar year previousYear2LastPayPeriod - Last pay statement of the calendar year 2 years prior
     * earliestPayPeriod - The earliest pay statement
     * @var string|null $label public property
     */
    public $label;

    /**
     * The base 64 encoded value for the pay statement.
     * @var array|null $statement public property
     */
    public $statement;

    /**
     * @todo Write general description for this property
     * @var string|null $assetId public property
     */
    public $assetId;

    /**
     * @todo Write general description for this property
     * @var string|null $fileType public property
     */
    public $fileType;

    /**
     * @todo Write general description for this property
     * @var bool|null $dataAvailable public property
     */
    public $dataAvailable;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $label         Initialization value for $this->label
     * @param array  $statement     Initialization value for $this->statement
     * @param string $assetId       Initialization value for $this->assetId
     * @param string $fileType      Initialization value for $this->fileType
     * @param bool   $dataAvailable Initialization value for $this->dataAvailable
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->label         = func_get_arg(0);
            $this->statement     = func_get_arg(1);
            $this->assetId       = func_get_arg(2);
            $this->fileType      = func_get_arg(3);
            $this->dataAvailable = func_get_arg(4);
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
        $json['label']         = $this->label;
        $json['statement']     = $this->statement;
        $json['assetId']       = $this->assetId;
        $json['fileType']      = $this->fileType;
        $json['dataAvailable'] = $this->dataAvailable;

        return array_merge($json, $this->additionalProperties);
    }
}
