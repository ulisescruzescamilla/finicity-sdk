<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOIETxverifyReportIncomeStream implements JsonSerializable
{
    /**
     * Finicity’s income stream ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * A human-readable name based on the normalizedPayee name of the transactions for this income stream
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * active or inactive
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Level of confidence that the deposit stream represents income (example: 85%)
     * @required
     * @var integer $confidence public property
     */
    public $confidence;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\CadenceDetails $cadence public property
     */
    public $cadence;

    /**
     * A list of net monthly records. One instance for each complete calendar month in the report
     * @required
     * @var \FinicityAPILib\Models\NetMonthly[] $netMonthly public property
     */
    public $netMonthly;

    /**
     * Sum of all values in netMonthlyIncome over the previous 12 months
     * @required
     * @var double $netAnnual public property
     */
    public $netAnnual;

    /**
     * Projected net income over the next 12 months, across all income streams, based on netAnnualIncome
     * @required
     * @var double $projectedNetAnnual public property
     */
    public $projectedNetAnnual;

    /**
     * Before-tax gross annual income (estimated from netAnnual) across all income stream in the past 12
     * months
     * @required
     * @var double $estimatedGrossAnnual public property
     */
    public $estimatedGrossAnnual;

    /**
     * Projected gross income over the next 12 months, across all active income streams, based on
     * projectedNetAnnual
     * @required
     * @var double $projectedGrossAnnual public property
     */
    public $projectedGrossAnnual;

    /**
     * Monthly average amount over the previous 24 months
     * @required
     * @var double $averageMonthlyIncomeNet public property
     */
    public $averageMonthlyIncomeNet;

    /**
     * The number of months the income transactions are observed
     * @required
     * @var integer $incomeStreamMonths public property
     */
    public $incomeStreamMonths;

    /**
     * A list of transaction records
     * @required
     * @var \FinicityAPILib\Models\VOIETxverifyReportTransaction[] $transactions public property
     */
    public $transactions;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string         $id                      Initialization value for $this->id
     * @param string         $name                    Initialization value for $this->name
     * @param string         $status                  Initialization value for $this->status
     * @param integer        $confidence              Initialization value for $this->confidence
     * @param CadenceDetails $cadence                 Initialization value for $this->cadence
     * @param array          $netMonthly              Initialization value for $this->netMonthly
     * @param double         $netAnnual               Initialization value for $this->netAnnual
     * @param double         $projectedNetAnnual      Initialization value for $this->projectedNetAnnual
     * @param double         $estimatedGrossAnnual    Initialization value for $this->estimatedGrossAnnual
     * @param double         $projectedGrossAnnual    Initialization value for $this->projectedGrossAnnual
     * @param double         $averageMonthlyIncomeNet Initialization value for $this->averageMonthlyIncomeNet
     * @param integer        $incomeStreamMonths      Initialization value for $this->incomeStreamMonths
     * @param array          $transactions            Initialization value for $this->transactions
     */
    public function __construct()
    {
        if (13 == func_num_args()) {
            $this->id                      = func_get_arg(0);
            $this->name                    = func_get_arg(1);
            $this->status                  = func_get_arg(2);
            $this->confidence              = func_get_arg(3);
            $this->cadence                 = func_get_arg(4);
            $this->netMonthly              = func_get_arg(5);
            $this->netAnnual               = func_get_arg(6);
            $this->projectedNetAnnual      = func_get_arg(7);
            $this->estimatedGrossAnnual    = func_get_arg(8);
            $this->projectedGrossAnnual    = func_get_arg(9);
            $this->averageMonthlyIncomeNet = func_get_arg(10);
            $this->incomeStreamMonths      = func_get_arg(11);
            $this->transactions            = func_get_arg(12);
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
        $json['id']                      = $this->id;
        $json['name']                    = $this->name;
        $json['status']                  = $this->status;
        $json['confidence']              = $this->confidence;
        $json['cadence']                 = $this->cadence;
        $json['netMonthly']              = $this->netMonthly;
        $json['netAnnual']               = $this->netAnnual;
        $json['projectedNetAnnual']      = $this->projectedNetAnnual;
        $json['estimatedGrossAnnual']    = $this->estimatedGrossAnnual;
        $json['projectedGrossAnnual']    = $this->projectedGrossAnnual;
        $json['averageMonthlyIncomeNet'] = $this->averageMonthlyIncomeNet;
        $json['incomeStreamMonths']      = $this->incomeStreamMonths;
        $json['transactions']            = $this->transactions;

        return array_merge($json, $this->additionalProperties);
    }
}
