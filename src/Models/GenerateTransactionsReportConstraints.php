<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The input body of the Transactions Report request.
 */
class GenerateTransactionsReportConstraints implements JsonSerializable
{
    /**
     * Specific accountIds to be included in the new report. If left blank, all accounts associated with
     * the Customer ID will be included.
     * @var string|null $accountIds public property
     */
    public $accountIds;

    /**
     * Designate up to 5 custom fields that you would like associated with the report upon generation by
     * providing a label for the field and a value for the field. Set the shown variable to true if you
     * want the custom field to display in the PDF reports. Set the shown variable to false to limit seeing
     * the variable to JSON, XML report but not in the PDF report. All custom fields will display in the
     * Reseller Billing endpoint.  This is optional.
     * @var \FinicityAPILib\Models\ReportCustomField[]|null $reportCustomFields public property
     */
    public $reportCustomFields;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $accountIds         Initialization value for $this->accountIds
     * @param array  $reportCustomFields Initialization value for $this->reportCustomFields
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->accountIds         = func_get_arg(0);
            $this->reportCustomFields = func_get_arg(1);
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
        $json['accountIds']         = $this->accountIds;
        $json['reportCustomFields'] = $this->reportCustomFields;

        return array_merge($json, $this->additionalProperties);
    }
}
