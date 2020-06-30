<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class DirectDeposit implements JsonSerializable
{
    /**
     * The name of the financial institution that the deposit was made to.
     * @required
     * @var string $financialInstitutionName public property
     */
    public $financialInstitutionName;

    /**
     * The type of account the deposit was made to.
     * @required
     * @var string $accountType public property
     */
    public $accountType;

    /**
     * The amount of the deposit.
     * @required
     * @var double $amountCurrent public property
     */
    public $amountCurrent;

    /**
     * The last four numbers of the account the deposit went into.
     * @required
     * @var string $accountLastFour public property
     */
    public $accountLastFour;

    /**
     * The description associated with the direct deposit.
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $financialInstitutionName Initialization value for $this->financialInstitutionName
     * @param string $accountType              Initialization value for $this->accountType
     * @param double $amountCurrent            Initialization value for $this->amountCurrent
     * @param string $accountLastFour          Initialization value for $this->accountLastFour
     * @param string $description              Initialization value for $this->description
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->financialInstitutionName = func_get_arg(0);
            $this->accountType              = func_get_arg(1);
            $this->amountCurrent            = func_get_arg(2);
            $this->accountLastFour          = func_get_arg(3);
            $this->description              = func_get_arg(4);
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
        $json['financialInstitutionName'] = $this->financialInstitutionName;
        $json['accountType']              = $this->accountType;
        $json['amountCurrent']            = $this->amountCurrent;
        $json['accountLastFour']          = $this->accountLastFour;
        $json['description']              = $this->description;

        return array_merge($json, $this->additionalProperties);
    }
}
