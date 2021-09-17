<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollReportResponseConstraints implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\PayrollResponseData[] $payrollProviderData public property
     */
    public $payrollProviderData;

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
     * @param array $payrollProviderData Initialization value for $this->payrollProviderData
     * @param array $reportCustomFields  Initialization value for $this->reportCustomFields
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->payrollProviderData = func_get_arg(0);
            $this->reportCustomFields  = func_get_arg(1);
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
        $json['payrollProviderData'] = $this->payrollProviderData;
        $json['reportCustomFields']  = $this->reportCustomFields;

        return array_merge($json, $this->additionalProperties);
    }
}
