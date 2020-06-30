<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PortfolioReport implements JsonSerializable
{
    /**
     * The Finicity report ID
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * A unique identifier that will be consistent across all reports created for the same customer.
     * @required
     * @var string $portfolioId public property
     */
    public $portfolioId;

    /**
     * Report type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The status of the report
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The date the report was generated
     * @required
     * @var integer $createdDate public property
     */
    public $createdDate;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $id          Initialization value for $this->id
     * @param string  $portfolioId Initialization value for $this->portfolioId
     * @param string  $type        Initialization value for $this->type
     * @param string  $status      Initialization value for $this->status
     * @param integer $createdDate Initialization value for $this->createdDate
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->portfolioId = func_get_arg(1);
            $this->type        = func_get_arg(2);
            $this->status      = func_get_arg(3);
            $this->createdDate = func_get_arg(4);
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
        $json['id']          = $this->id;
        $json['portfolioId'] = $this->portfolioId;
        $json['type']        = $this->type;
        $json['status']      = $this->status;
        $json['createdDate'] = $this->createdDate;

        return array_merge($json, $this->additionalProperties);
    }
}
