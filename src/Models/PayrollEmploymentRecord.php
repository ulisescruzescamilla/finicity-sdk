<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class PayrollEmploymentRecord implements JsonSerializable
{
    /**
     * Name of the employer as stated by the employer in the payroll system.
     * @required
     * @var string $employerName public property
     */
    public $employerName;

    /**
     * Employer identification number (EIN)
     * @var string|null $legalEntityId public property
     */
    public $legalEntityId;

    /**
     * The original hired date of an employee at the company.
     * @var integer|null $originalHireDate public property
     */
    public $originalHireDate;

    /**
     * If an employee leaves the company and returns later, then the employer states the latest hire date
     * at the company.
     * @var integer|null $latestHireDate public property
     */
    public $latestHireDate;

    /**
     * The most recent pay date from an employer.
     * @required
     * @var integer $latestPayDate public property
     */
    public $latestPayDate;

    /**
     * The number of days since an employee was last paid.
     * @required
     * @var integer $daysSinceLastPay public property
     */
    public $daysSinceLastPay;

    /**
     * The number of pay cadences an employee has not been paid; determined by the pay frequency.
     * @required
     * @var integer $numberPayCadenceWithoutPay public property
     */
    public $numberPayCadenceWithoutPay;

    /**
     * The date an employee ended their employment at the company.
     * @var integer|null $employmentEndDate public property
     */
    public $employmentEndDate;

    /**
     * The length of time an employee has been employed with that employer in ISO 8601 format (eg P1Y6M0D)
     * @var string|null $employmentDuration public property
     */
    public $employmentDuration;

    /**
     * Array of addresses
     * @var \FinicityAPILib\Models\PayrollEmployerAddress[]|null $employerAddress public property
     */
    public $employerAddress;

    /**
     * Status codes: `A` - Active, `NLE` - No Longer Employed, `L` - Leave
     * @required
     * @var string $employmentStatusCode public property
     */
    public $employmentStatusCode;

    /**
     * Status name: `Active`, `No Longer Employed`, or `Leave`
     * @required
     * @var string $employmentStatusName public property
     */
    public $employmentStatusName;

    /**
     * The abbreviate code for the employment level names (workLevelName) that we receive from the employer.
     * @var string|null $workLevelCode public property
     */
    public $workLevelCode;

    /**
     * The employment level name is whatever we receive from the employer, such as full time, part time,
     * temp, contractor, and more.
     * @var string|null $workLevelName public property
     */
    public $workLevelName;

    /**
     * The categorized work level status. Enumerations are: <br> * `Temporary` <br> * `Seasonal` <br> *
     * `Retired` <br> * `Student` <br> * `Full Time` <br> * `Part Time` <br> * `Unspecified` <br> This is a
     * new field, currently enabled only for testing reports. It will be added for all reports in August
     * 2021.
     * @required
     * @var string $workLevelStatus public property
     */
    public $workLevelStatus;

    /**
     * Employee job title
     * @var string|null $positionTitle public property
     */
    public $positionTitle;

    /**
     * The length of time an employee has been employed at their current or latest position for this
     * employment in ISO 8601 format (eg P1Y6M0D)
     * @var string|null $positionDuration public property
     */
    public $positionDuration;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $employerName               Initialization value for $this->employerName
     * @param string  $legalEntityId              Initialization value for $this->legalEntityId
     * @param integer $originalHireDate           Initialization value for $this->originalHireDate
     * @param integer $latestHireDate             Initialization value for $this->latestHireDate
     * @param integer $latestPayDate              Initialization value for $this->latestPayDate
     * @param integer $daysSinceLastPay           Initialization value for $this->daysSinceLastPay
     * @param integer $numberPayCadenceWithoutPay Initialization value for $this->numberPayCadenceWithoutPay
     * @param integer $employmentEndDate          Initialization value for $this->employmentEndDate
     * @param string  $employmentDuration         Initialization value for $this->employmentDuration
     * @param array   $employerAddress            Initialization value for $this->employerAddress
     * @param string  $employmentStatusCode       Initialization value for $this->employmentStatusCode
     * @param string  $employmentStatusName       Initialization value for $this->employmentStatusName
     * @param string  $workLevelCode              Initialization value for $this->workLevelCode
     * @param string  $workLevelName              Initialization value for $this->workLevelName
     * @param string  $workLevelStatus            Initialization value for $this->workLevelStatus
     * @param string  $positionTitle              Initialization value for $this->positionTitle
     * @param string  $positionDuration           Initialization value for $this->positionDuration
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
            $this->employerName               = func_get_arg(0);
            $this->legalEntityId              = func_get_arg(1);
            $this->originalHireDate           = func_get_arg(2);
            $this->latestHireDate             = func_get_arg(3);
            $this->latestPayDate              = func_get_arg(4);
            $this->daysSinceLastPay           = func_get_arg(5);
            $this->numberPayCadenceWithoutPay = func_get_arg(6);
            $this->employmentEndDate          = func_get_arg(7);
            $this->employmentDuration         = func_get_arg(8);
            $this->employerAddress            = func_get_arg(9);
            $this->employmentStatusCode       = func_get_arg(10);
            $this->employmentStatusName       = func_get_arg(11);
            $this->workLevelCode              = func_get_arg(12);
            $this->workLevelName              = func_get_arg(13);
            $this->workLevelStatus            = func_get_arg(14);
            $this->positionTitle              = func_get_arg(15);
            $this->positionDuration           = func_get_arg(16);
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
        $json['employerName']               = $this->employerName;
        $json['legalEntityId']              = $this->legalEntityId;
        $json['originalHireDate']           = $this->originalHireDate;
        $json['latestHireDate']             = $this->latestHireDate;
        $json['latestPayDate']              = $this->latestPayDate;
        $json['daysSinceLastPay']           = $this->daysSinceLastPay;
        $json['numberPayCadenceWithoutPay'] = $this->numberPayCadenceWithoutPay;
        $json['employmentEndDate']          = $this->employmentEndDate;
        $json['employmentDuration']         = $this->employmentDuration;
        $json['employerAddress']            = $this->employerAddress;
        $json['employmentStatusCode']       = $this->employmentStatusCode;
        $json['employmentStatusName']       = $this->employmentStatusName;
        $json['workLevelCode']              = $this->workLevelCode;
        $json['workLevelName']              = $this->workLevelName;
        $json['workLevelStatus']            = $this->workLevelStatus;
        $json['positionTitle']              = $this->positionTitle;
        $json['positionDuration']           = $this->positionDuration;

        return array_merge($json, $this->additionalProperties);
    }
}
