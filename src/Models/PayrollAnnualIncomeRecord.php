<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollAnnualIncomeRecord implements JsonSerializable
{
    /**
     * The year for the amounts given in the YTD totals for an employer
     * @required
     * @var string $year public property
     */
    public $year;

    /**
     * The YTD gross pay amount for the year indicated
     * @required
     * @var double $grossPayAmountYTD public property
     */
    public $grossPayAmountYTD;

    /**
     * The YTD net pay amount for the year indicated
     * @required
     * @var double $netPayAmountYTD public property
     */
    public $netPayAmountYTD;

    /**
     * The YTD base pay amount for the year indicated
     * @required
     * @var double $basePayAmountYTD public property
     */
    public $basePayAmountYTD;

    /**
     * The YTD overtime pay amount for the year indicated
     * @var double|null $overtimePayAmountYTD public property
     */
    public $overtimePayAmountYTD;

    /**
     * The YTD bonus pay amount for the year indicated
     * @var double|null $bonusPayAmountYTD public property
     */
    public $bonusPayAmountYTD;

    /**
     * The YTD other pay amount for the year indicated. Other pay is pay not categorized, commission pay,
     * car allowances, and more.
     * @var double|null $otherPayAmountYTD public property
     */
    public $otherPayAmountYTD;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $year                 Initialization value for $this->year
     * @param double $grossPayAmountYTD    Initialization value for $this->grossPayAmountYTD
     * @param double $netPayAmountYTD      Initialization value for $this->netPayAmountYTD
     * @param double $basePayAmountYTD     Initialization value for $this->basePayAmountYTD
     * @param double $overtimePayAmountYTD Initialization value for $this->overtimePayAmountYTD
     * @param double $bonusPayAmountYTD    Initialization value for $this->bonusPayAmountYTD
     * @param double $otherPayAmountYTD    Initialization value for $this->otherPayAmountYTD
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->year                 = func_get_arg(0);
            $this->grossPayAmountYTD    = func_get_arg(1);
            $this->netPayAmountYTD      = func_get_arg(2);
            $this->basePayAmountYTD     = func_get_arg(3);
            $this->overtimePayAmountYTD = func_get_arg(4);
            $this->bonusPayAmountYTD    = func_get_arg(5);
            $this->otherPayAmountYTD    = func_get_arg(6);
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
        $json['year']                 = $this->year;
        $json['grossPayAmountYTD']    = $this->grossPayAmountYTD;
        $json['netPayAmountYTD']      = $this->netPayAmountYTD;
        $json['basePayAmountYTD']     = $this->basePayAmountYTD;
        $json['overtimePayAmountYTD'] = $this->overtimePayAmountYTD;
        $json['bonusPayAmountYTD']    = $this->bonusPayAmountYTD;
        $json['otherPayAmountYTD']    = $this->otherPayAmountYTD;

        return array_merge($json, $this->additionalProperties);
    }
}
