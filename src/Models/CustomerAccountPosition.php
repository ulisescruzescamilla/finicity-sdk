<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Details for investment account holdings
 */
class CustomerAccountPosition implements JsonSerializable
{
    /**
     * The id of the investment position
     * @var integer|null $id public property
     */
    public $id;

    /**
     * The description of the holding
     * @var string|null $description public property
     */
    public $description;

    /**
     * A nine-digit numeric or nine-character alphanumeric code that identifies a North American financial
     * security (will be changed to SecurityIdType in the next API version, v2)
     * @var string|null $cusipNo public property
     */
    public $cusipNo;

    /**
     * Type of the security, attached Finicity's cusipNo field (will be changed to SecurityIdType in the
     * next API version, v2)
     * @var string|null $cusipNoType public property
     */
    public $cusipNoType;

    /**
     * The investment position's market/ticker symbol
     * @var string|null $symbol public property
     */
    public $symbol;

    /**
     * The quantity of investment holdings
     * @var double|null $units public property
     */
    public $units;

    /**
     * The current price of the investment holding
     * @var double|null $currentPrice public property
     */
    public $currentPrice;

    /**
     * The security name for the investment holding
     * @var string|null $securityName public property
     */
    public $securityName;

    /**
     * The transaction type of the holding. Cash, Margin, POSSTOCK, Etc
     * @var string|null $transactionType public property
     */
    public $transactionType;

    /**
     * Market value of an investment position at the time of retrieval
     * @var double|null $marketValue public property
     */
    public $marketValue;

    /**
     * The total cost of acquiring the ssecurity
     * @var double|null $costBasis public property
     */
    public $costBasis;

    /**
     * The status of the holding
     * @var string|null $status public property
     */
    public $status;

    /**
     * The latest date the price date was updated. In epoch time.
     * @var integer|null $currentPriceDate public property
     */
    public $currentPriceDate;

    /**
     * The investment holding security type
     * @var string|null $invSecurityType public property
     */
    public $invSecurityType;

    /**
     * Type of mutual fund (e.g., open-ended)
     * @var string|null $mfType public property
     */
    public $mfType;

    /**
     * Fund Type assigned by the FI (long or short)
     * @var string|null $posType public property
     */
    public $posType;

    /**
     * Total Gain/Loss of the position, at the time of aggregation ($)
     * @var double|null $totalGLDollar public property
     */
    public $totalGLDollar;

    /**
     * Total Gain/Loss of the position, at the time of aggregation (%)
     * @var double|null $totalGLPercent public property
     */
    public $totalGLPercent;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id               Initialization value for $this->id
     * @param string  $description      Initialization value for $this->description
     * @param string  $cusipNo          Initialization value for $this->cusipNo
     * @param string  $cusipNoType      Initialization value for $this->cusipNoType
     * @param string  $symbol           Initialization value for $this->symbol
     * @param double  $units            Initialization value for $this->units
     * @param double  $currentPrice     Initialization value for $this->currentPrice
     * @param string  $securityName     Initialization value for $this->securityName
     * @param string  $transactionType  Initialization value for $this->transactionType
     * @param double  $marketValue      Initialization value for $this->marketValue
     * @param double  $costBasis        Initialization value for $this->costBasis
     * @param string  $status           Initialization value for $this->status
     * @param integer $currentPriceDate Initialization value for $this->currentPriceDate
     * @param string  $invSecurityType  Initialization value for $this->invSecurityType
     * @param string  $mfType           Initialization value for $this->mfType
     * @param string  $posType          Initialization value for $this->posType
     * @param double  $totalGLDollar    Initialization value for $this->totalGLDollar
     * @param double  $totalGLPercent   Initialization value for $this->totalGLPercent
     */
    public function __construct()
    {
        if (18 == func_num_args()) {
            $this->id               = func_get_arg(0);
            $this->description      = func_get_arg(1);
            $this->cusipNo          = func_get_arg(2);
            $this->cusipNoType      = func_get_arg(3);
            $this->symbol           = func_get_arg(4);
            $this->units            = func_get_arg(5);
            $this->currentPrice     = func_get_arg(6);
            $this->securityName     = func_get_arg(7);
            $this->transactionType  = func_get_arg(8);
            $this->marketValue      = func_get_arg(9);
            $this->costBasis        = func_get_arg(10);
            $this->status           = func_get_arg(11);
            $this->currentPriceDate = func_get_arg(12);
            $this->invSecurityType  = func_get_arg(13);
            $this->mfType           = func_get_arg(14);
            $this->posType          = func_get_arg(15);
            $this->totalGLDollar    = func_get_arg(16);
            $this->totalGLPercent   = func_get_arg(17);
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
        $json['id']               = $this->id;
        $json['description']      = $this->description;
        $json['cusipNo']          = $this->cusipNo;
        $json['cusipNoType']      = $this->cusipNoType;
        $json['symbol']           = $this->symbol;
        $json['units']            = $this->units;
        $json['currentPrice']     = $this->currentPrice;
        $json['securityName']     = $this->securityName;
        $json['transactionType']  = $this->transactionType;
        $json['marketValue']      = $this->marketValue;
        $json['costBasis']        = $this->costBasis;
        $json['status']           = $this->status;
        $json['currentPriceDate'] = $this->currentPriceDate;
        $json['invSecurityType']  = $this->invSecurityType;
        $json['mfType']           = $this->mfType;
        $json['posType']          = $this->posType;
        $json['totalGLDollar']    = $this->totalGLDollar;
        $json['totalGLPercent']   = $this->totalGLPercent;

        return array_merge($json, $this->additionalProperties);
    }
}
