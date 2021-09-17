<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollMainPaystatementFields implements JsonSerializable
{
    /**
     * Pay date for a pay period
     * @required
     * @var integer $payDate public property
     */
    public $payDate;

    /**
     * Start date for a pay period
     * @var integer|null $startDate public property
     */
    public $startDate;

    /**
     * End date for a pay period
     * @var integer|null $endDate public property
     */
    public $endDate;

    /**
     * The sum total of the number of hours worked each week for a pay period.
     * @var integer|null $payPeriodHours public property
     */
    public $payPeriodHours;

    /**
     * Gross pay amount for a pay period
     * @required
     * @var double $grossPayAmount public property
     */
    public $grossPayAmount;

    /**
     * YTD gross pay amount at the time of the payment
     * @var double|null $grossPayAmountYTD public property
     */
    public $grossPayAmountYTD;

    /**
     * Net pay amount for a pay period
     * @required
     * @var double $netPayAmount public property
     */
    public $netPayAmount;

    /**
     * YTD net pay amount at the time of the payment
     * @var double|null $netPayAmountYTD public property
     */
    public $netPayAmountYTD;

    /**
     * The pay frequency: <br> * `Daily` <br> * `Weekly` <br> * `Bi-Weekly` <br> * `Bi-Weekly Odd` (Bi-
     * Weekly pay on odd weeks) <br> * `Bi-Weekly Even` (Bi-Weekly pay on even weeks) <br> * `Semi-Monthly`
     * <br> * `Monthly` <br> * `Quarterly` <br>* `Semi-Annual` <br> * `Annual` <br>  * `Every 2.6 wks` <br>
     * * `Every 4 wks` <br> * `Every 5.2 wks`
     * @required
     * @var string $payFrequency public property
     */
    public $payFrequency;

    /**
     * The pay type is `Salary`, `Hourly`, or `Daily`.
     * @var string|null $payType public property
     */
    public $payType;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $payDate           Initialization value for $this->payDate
     * @param integer $startDate         Initialization value for $this->startDate
     * @param integer $endDate           Initialization value for $this->endDate
     * @param integer $payPeriodHours    Initialization value for $this->payPeriodHours
     * @param double  $grossPayAmount    Initialization value for $this->grossPayAmount
     * @param double  $grossPayAmountYTD Initialization value for $this->grossPayAmountYTD
     * @param double  $netPayAmount      Initialization value for $this->netPayAmount
     * @param double  $netPayAmountYTD   Initialization value for $this->netPayAmountYTD
     * @param string  $payFrequency      Initialization value for $this->payFrequency
     * @param string  $payType           Initialization value for $this->payType
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->payDate           = func_get_arg(0);
            $this->startDate         = func_get_arg(1);
            $this->endDate           = func_get_arg(2);
            $this->payPeriodHours    = func_get_arg(3);
            $this->grossPayAmount    = func_get_arg(4);
            $this->grossPayAmountYTD = func_get_arg(5);
            $this->netPayAmount      = func_get_arg(6);
            $this->netPayAmountYTD   = func_get_arg(7);
            $this->payFrequency      = func_get_arg(8);
            $this->payType           = func_get_arg(9);
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
        $json['payDate']           = $this->payDate;
        $json['startDate']         = $this->startDate;
        $json['endDate']           = $this->endDate;
        $json['payPeriodHours']    = $this->payPeriodHours;
        $json['grossPayAmount']    = $this->grossPayAmount;
        $json['grossPayAmountYTD'] = $this->grossPayAmountYTD;
        $json['netPayAmount']      = $this->netPayAmount;
        $json['netPayAmountYTD']   = $this->netPayAmountYTD;
        $json['payFrequency']      = $this->payFrequency;
        $json['payType']           = $this->payType;

        return array_merge($json, $this->additionalProperties);
    }
}
