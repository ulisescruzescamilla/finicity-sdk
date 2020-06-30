<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class TxverifyInterview implements JsonSerializable
{
    /**
     * The assetId assigned to the pay statement.
     * @required
     * @var string $assetId public property
     */
    public $assetId;

    /**
     * The net pay the consumer entered during the interview. This is an optional field
     * @required
     * @var double $netPayCurrent public property
     */
    public $netPayCurrent;

    /**
     * The gross pay the consumer entered during the interview. This is an optional field
     * @required
     * @var double $grossPayCurrent public property
     */
    public $grossPayCurrent;

    /**
     * The name of the employer the consumer entered during the interview. This is an optional field
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * The pay date the consumer entered during the interview. This is an optional field
     * @required
     * @var integer $date public property
     */
    public $date;

    /**
     * An array of accounts objects that contain Account Interview data.
     * @required
     * @var \FinicityAPILib\Models\InterviewAccounts[] $accounts public property
     */
    public $accounts;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $assetId         Initialization value for $this->assetId
     * @param double  $netPayCurrent   Initialization value for $this->netPayCurrent
     * @param double  $grossPayCurrent Initialization value for $this->grossPayCurrent
     * @param string  $name            Initialization value for $this->name
     * @param integer $date            Initialization value for $this->date
     * @param array   $accounts        Initialization value for $this->accounts
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->assetId         = func_get_arg(0);
            $this->netPayCurrent   = func_get_arg(1);
            $this->grossPayCurrent = func_get_arg(2);
            $this->name            = func_get_arg(3);
            $this->date            = func_get_arg(4);
            $this->accounts        = func_get_arg(5);
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
        $json['assetId']         = $this->assetId;
        $json['netPayCurrent']   = $this->netPayCurrent;
        $json['grossPayCurrent'] = $this->grossPayCurrent;
        $json['name']            = $this->name;
        $json['date']            = $this->date;
        $json['accounts']        = $this->accounts;

        return array_merge($json, $this->additionalProperties);
    }
}
