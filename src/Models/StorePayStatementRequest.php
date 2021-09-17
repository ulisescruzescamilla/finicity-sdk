<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class StorePayStatementRequest implements JsonSerializable
{
    /**
     * The label to be associated with the pay statement: <br> * `lastPayPeriod` This label will allow the
     * paystub to go through data extraction. This is the default label that should be used for our VOIE -
     * Paystub products. <br> * `lastPayPeriodMinusOne` The second most recent pay statement. <br> *
     * `lastPayPeriodMinusTwo` The third most recent pay statement. <br> * `previousYearLastPayPeriod`
     * Last pay statement of the previous calendar year. <br> * `previousYear2LastPayPeriod`  Last pay
     * statement of the calendar year 2 years prior. <br> * `earliestPayPeriod`  The earliest pay statement.
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * The base 64 encoded value for the pay statement. Finicity supported file types are .pdf, .jpg, or .
     * png.
     * @required
     * @var string $statement public property
     */
    public $statement;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $label     Initialization value for $this->label
     * @param string $statement Initialization value for $this->statement
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->label     = func_get_arg(0);
            $this->statement = func_get_arg(1);
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
        $json['label']     = $this->label;
        $json['statement'] = $this->statement;

        return array_merge($json, $this->additionalProperties);
    }
}
