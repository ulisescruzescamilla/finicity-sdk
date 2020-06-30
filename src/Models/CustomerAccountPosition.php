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
     * Cusip number for the investment holding
     * @var integer|null $cusipNo public property
     */
    public $cusipNo;

    /**
     * The symbol of the investment holding
     * @var string|null $symbol public property
     */
    public $symbol;

    /**
     * The quantity of investment holdings
     * @var double|null $quantity public property
     */
    public $quantity;

    /**
     * The current price of the investment holding
     * @var double|null $currentPrice public property
     */
    public $currentPrice;

    /**
     * The fund name for the investment holding
     * @var string|null $fundName public property
     */
    public $fundName;

    /**
     * The transaction type of the holding. Cash, Margin, POSSTOCK, Etc
     * @var string|null $transactionType public property
     */
    public $transactionType;

    /**
     * The market value of the holding
     * @var double|null $marketValue public property
     */
    public $marketValue;

    /**
     * The cost basis of the holding
     * @var double|null $costBasis public property
     */
    public $costBasis;

    /**
     * The # of units of the holding
     * @var double|null $units public property
     */
    public $units;

    /**
     * The unit price of the holding
     * @var double|null $unitPrice public property
     */
    public $unitPrice;

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
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $id               Initialization value for $this->id
     * @param string  $description      Initialization value for $this->description
     * @param integer $cusipNo          Initialization value for $this->cusipNo
     * @param string  $symbol           Initialization value for $this->symbol
     * @param double  $quantity         Initialization value for $this->quantity
     * @param double  $currentPrice     Initialization value for $this->currentPrice
     * @param string  $fundName         Initialization value for $this->fundName
     * @param string  $transactionType  Initialization value for $this->transactionType
     * @param double  $marketValue      Initialization value for $this->marketValue
     * @param double  $costBasis        Initialization value for $this->costBasis
     * @param double  $units            Initialization value for $this->units
     * @param double  $unitPrice        Initialization value for $this->unitPrice
     * @param string  $status           Initialization value for $this->status
     * @param integer $currentPriceDate Initialization value for $this->currentPriceDate
     * @param string  $invSecurityType  Initialization value for $this->invSecurityType
     */
    public function __construct()
    {
        if (15 == func_num_args()) {
            $this->id               = func_get_arg(0);
            $this->description      = func_get_arg(1);
            $this->cusipNo          = func_get_arg(2);
            $this->symbol           = func_get_arg(3);
            $this->quantity         = func_get_arg(4);
            $this->currentPrice     = func_get_arg(5);
            $this->fundName         = func_get_arg(6);
            $this->transactionType  = func_get_arg(7);
            $this->marketValue      = func_get_arg(8);
            $this->costBasis        = func_get_arg(9);
            $this->units            = func_get_arg(10);
            $this->unitPrice        = func_get_arg(11);
            $this->status           = func_get_arg(12);
            $this->currentPriceDate = func_get_arg(13);
            $this->invSecurityType  = func_get_arg(14);
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
        $json['symbol']           = $this->symbol;
        $json['quantity']         = $this->quantity;
        $json['currentPrice']     = $this->currentPrice;
        $json['fundName']         = $this->fundName;
        $json['transactionType']  = $this->transactionType;
        $json['marketValue']      = $this->marketValue;
        $json['costBasis']        = $this->costBasis;
        $json['units']            = $this->units;
        $json['unitPrice']        = $this->unitPrice;
        $json['status']           = $this->status;
        $json['currentPriceDate'] = $this->currentPriceDate;
        $json['invSecurityType']  = $this->invSecurityType;

        return array_merge($json, $this->additionalProperties);
    }
}
