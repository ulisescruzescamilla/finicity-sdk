<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class V2ConnectEmailRequestJointBorrower implements JsonSerializable
{
    /**
     * Your partner id from the [Finicity Developer Portal](https://signup.finicity.com/).
     * @required
     * @var string $partnerId public property
     */
    public $partnerId;

    /**
     * (MVS) Array of borrowers to pass the primary and joint borrower’s customer and consumer IDs.
     * @required
     * @var \FinicityAPILib\Models\Borrowers[] $borrowers public property
     */
    public $borrowers;

    /**
     * The URL that customers are redirected after they complete the Connect application.  If this
     * parameter isn’t specified, then a thank you screen appears and the customer ends Connect.
     * @var string|null $redirectUri public property
     */
    public $redirectUri;

    /**
     * The URL used to send notifications about events as the user interacts with screens throughout the
     * Connect application. See [Connect Webhooks]( https://docs.finicity.com/connect-webhooks/)
     * @var string|null $webhook public property
     */
    public $webhook;

    /**
     * The content type that the webhook events are sent.
     * @var string|null $webhookContentType public property
     */
    public $webhookContentType;

    /**
     * Allows you to insert additional information into the Connect webhook events payload. See [Connect
     * Custom Webhooks Data and Headers]( https://docs.finicity.com/connect-custom-webhook-data-and-
     * headers/)
     * @var object|null $webhookData public property
     */
    public $webhookData;

    /**
     * Allows you to include header information for the Connect webhook events. See [Connect Custom
     * Webhooks Data and Headers]( https://docs.finicity.com/connect-custom-webhook-data-and-headers/)
     * @var object|null $webhookHeaders public property
     */
    public $webhookHeaders;

    /**
     * Advanced configuration options to display institutions. See [Institution Settings](https://docs-new.
     * finicitydev.com/connect-institutions-options/)
     * @var object|null $institutionSettings public property
     */
    public $institutionSettings;

    /**
     * The configuration email details.
     * @required
     * @var \FinicityAPILib\Models\ConnectV2EmailOptions $email public property
     */
    public $email;

    /**
     * The `experience` field allows you to customize: <br> * **Brand**: color and logo <br> * **Icon**:
     * displayed on the Share your data page <br> * **Popular institutions**: displayed on the Bank Search
     * page <br> * **Report**: the credit decisioning report to send when Connect completes. <br> * **MVS
     * modules**: financial, payroll, paystub <br>      <br>**Note**: The Finicity sales engineers (SE)
     * help you set up a default experience for your company when you migrate to Connect 2.0. For each
     * additional experience you create thereafter, they’ll give you a unique ID. See [Generate 2.0 Connect
     * URL APIs](https://docs.finicity.com/migrate-to-connect-web-sdk-2-0/#migrate-connect-web-sdk-1) <br>
     * <br>**Experience values options**: <br> * **default**: your default experience <br> * **unique
     * ID**: the code for a different experience <br>
     * @required
     * @var string $experience public property
     */
    public $experience;

    /**
     * The `fromDate` parameter is used when experiences are associated with a credit decisioning report
     * and any other reports with transaction data. <br> The value is in epoch time and must be 10 digits.
     * **Example**: 1494449017. <br>  <br>If it’s greater than 10 digits, then the `fromDate` is set to the
     * credit decisioning report’s default `fromDate`.<br>  <br>For an experience that generates multiple
     * reports the `fromDate` gets passed to the reports that support it. <br>  <br>However, Connect
     * doesn’t pass this parameter to the following reports: <br> * Pay Statement Extraction Report <br> *
     * VOIE - Paystub (with TXVerify) Report <br>  * Statement Report <br> * Verification of Income Report
     * <br> * VOIE - Payroll Report  <br> <br>**Note**: this field isn’t used if you’re only collecting
     * transaction data without a report.
     * @var integer|null $fromDate public property
     */
    public $fromDate;

    /**
     * The `reportCustomFields` parameter is used when experiences are associated with a credit decisioning
     * report. <br>  <br>Designate up to 5 custom fields that you’d like associated with the report when
     * it’s generated. Every custom field consists of three variables: `label`, `value`, and `shown`. The
     * `shown` variable is true or false. <br>* **True**: (default) display the custom field in the PDF
     * report. <br>  <br>* **False**: don’t display the custom field in the PDF report. <br>  <br>For an
     * experience that generates multiple reports, the `reportCustomFields` parameter gets passed to all
     * reports.<br>  <br>All custom fields display in the Reseller Billing endpoint.<br>
     * @var \FinicityAPILib\Models\ReportCustomFields[]|null $reportCustomFields public property
     */
    public $reportCustomFields;

    /**
     * **True**: The URL link expires after a Connect session successfully completes. <br> <br> **Note**:
     * When the `singleUseUrl` and the `experience` parameters are passed in the same call, the
     * `singleUseUrl` value overrides the `singleUseUrl` value configured in the `experience` parameter.
     * @var bool|null $singleUseUrl public property
     */
    public $singleUseUrl;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string                $partnerId           Initialization value for $this->partnerId
     * @param array                 $borrowers           Initialization value for $this->borrowers
     * @param string                $redirectUri         Initialization value for $this->redirectUri
     * @param string                $webhook             Initialization value for $this->webhook
     * @param string                $webhookContentType  Initialization value for $this->webhookContentType
     * @param object                $webhookData         Initialization value for $this->webhookData
     * @param object                $webhookHeaders      Initialization value for $this->webhookHeaders
     * @param object                $institutionSettings Initialization value for $this->institutionSettings
     * @param ConnectV2EmailOptions $email               Initialization value for $this->email
     * @param string                $experience          Initialization value for $this->experience
     * @param integer               $fromDate            Initialization value for $this->fromDate
     * @param array                 $reportCustomFields  Initialization value for $this->reportCustomFields
     * @param bool                  $singleUseUrl        Initialization value for $this->singleUseUrl
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 13:
                $this->partnerId           = func_get_arg(0);
                $this->borrowers           = func_get_arg(1);
                $this->redirectUri         = func_get_arg(2);
                $this->webhook             = func_get_arg(3);
                $this->webhookContentType  = func_get_arg(4);
                $this->webhookData         = func_get_arg(5);
                $this->webhookHeaders      = func_get_arg(6);
                $this->institutionSettings = func_get_arg(7);
                $this->email               = func_get_arg(8);
                $this->experience          = func_get_arg(9);
                $this->fromDate            = func_get_arg(10);
                $this->reportCustomFields  = func_get_arg(11);
                $this->singleUseUrl        = func_get_arg(12);
                break;

            default:
                $this->webhookContentType = 'application/json';
                break;
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
        $json['partnerId']           = $this->partnerId;
        $json['borrowers']           = $this->borrowers;
        $json['redirectUri']         = $this->redirectUri;
        $json['webhook']             = $this->webhook;
        $json['webhookContentType']  = $this->webhookContentType;
        $json['webhookData']         = $this->webhookData;
        $json['webhookHeaders']      = $this->webhookHeaders;
        $json['institutionSettings'] = $this->institutionSettings;
        $json['email']               = $this->email;
        $json['experience']          = $this->experience;
        $json['fromDate']            = $this->fromDate;
        $json['reportCustomFields']  = $this->reportCustomFields;
        $json['singleUseUrl']        = $this->singleUseUrl;

        return array_merge($json, $this->additionalProperties);
    }
}
