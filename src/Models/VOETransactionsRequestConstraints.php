<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class VOETransactionsRequestConstraints implements JsonSerializable
{
    /**
     * The reportId of the original VOAI report or VOIE - Paystub (with TXVerify) report. This is an
     * optional field and if included only the accounts from the report would be included in the VOE -
     * Transactions report, otherwise all accounts for the consumer would be considered.
     * @var string|null $reportId public property
     */
    public $reportId;

    /**
     * Specific accountIds to be included in the new report. This is an optional field if the client would
     * like to constrain the report to specific accounts.
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
     * @param string $reportId           Initialization value for $this->reportId
     * @param string $accountIds         Initialization value for $this->accountIds
     * @param array  $reportCustomFields Initialization value for $this->reportCustomFields
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->reportId           = func_get_arg(0);
            $this->accountIds         = func_get_arg(1);
            $this->reportCustomFields = func_get_arg(2);
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
        $json['reportId']           = $this->reportId;
        $json['accountIds']         = $this->accountIds;
        $json['reportCustomFields'] = $this->reportCustomFields;

        return array_merge($json, $this->additionalProperties);
    }
}
