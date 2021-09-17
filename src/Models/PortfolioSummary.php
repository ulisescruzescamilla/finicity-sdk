<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PortfolioSummary implements JsonSerializable
{
    /**
     * A unique identifier that will be consistent across all reports created for the same customer.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * Information pertaining to the consumer
     * @required
     * @var \FinicityAPILib\Models\PortfolioConsumer $consumer public property
     */
    public $consumer;

    /**
     * A list of reports in the portfolio
     * @required
     * @var \FinicityAPILib\Models\PortfolioReport[] $reports public property
     */
    public $reports;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string            $portfolioId Initialization value for $this->portfolioId
     * @param PortfolioConsumer $consumer    Initialization value for $this->consumer
     * @param array             $reports     Initialization value for $this->reports
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->portfolioId = func_get_arg(0);
            $this->consumer    = func_get_arg(1);
            $this->reports     = func_get_arg(2);
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
        $json['portfolioId'] = $this->portfolioId;
        $json['consumer']    = $this->consumer;
        $json['reports']     = $this->reports;

        return array_merge($json, $this->additionalProperties);
    }
}
