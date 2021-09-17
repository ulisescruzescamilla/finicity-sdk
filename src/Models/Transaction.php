<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Transaction implements JsonSerializable
{
    /**
     * The Finicity ID of the transaction
     * @required
     * @var integer $id public property
     */
    public $id;

    /**
     * The total amount of the transaction. Transactions for deposits are positive values, withdrawals and
     * debits are negative values.
     * @required
     * @var double $amount public property
     */
    public $amount;

    /**
     * The Finicity ID of the account associated with this transaction
     * @required
     * @var integer $accountId public property
     */
    public $accountId;

    /**
     * The Finicity ID of the customer associated with this transaction
     * @required
     * @var integer $customerId public property
     */
    public $customerId;

    /**
     * One of active, pending, or shadow (see Pending Transactions and Shadow Transactions)
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * The description of the transaction, as provided by the institution (often known as payee). In the
     * event that this field is left blank by the institution, Finicity will pass a value of "No
     * description provided by institution”. All other values are provided by the institution.
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * The memo field of the transaction, as provided by the institution. The institution must provide
     * either a description, a memo, or both. It is recommended to concatenate the two fields into a single
     * value
     * @var string|null $memo public property
     */
    public $memo;

    /**
     * A timestamp showing when the transaction was posted or cleared by the institution (see Handling
     * Dates and Times)
     * @required
     * @var string $postedDate public property
     */
    public $postedDate;

    /**
     * An optional timestamp showing when the transaction occurred, as provided by the institution (see
     * Handling Dates and Times)
     * @var string|null $transactionDate public property
     */
    public $transactionDate;

    /**
     * A timestamp showing when the transaction was added to the Finicity system. (See Handling Dates and
     * Times.) This value usually is not interesting outside of Finicity.
     * @required
     * @var string $createdDate public property
     */
    public $createdDate;

    /**
     * @todo Write general description for this property
     * @var string|null $type public property
     */
    public $type;

    /**
     * The check number of the transaction, as provided by the institution
     * @var integer|null $checkNum public property
     */
    public $checkNum;

    /**
     * The portion of the transaction allocated to escrow, if available
     * @var double|null $escrowAmount public property
     */
    public $escrowAmount;

    /**
     * The portion of the transaction allocated to fee, if available
     * @var double|null $feeAmount public property
     */
    public $feeAmount;

    /**
     * The portion of the transaction allocated to interest, if available
     * @var double|null $interestAmount public property
     */
    public $interestAmount;

    /**
     * The portion of the transaction allocated to principal, if available
     * @var double|null $principalAmount public property
     */
    public $principalAmount;

    /**
     * The number of units (e.g. individual shares) in the transaction, if available
     * @var integer|null $unitQuantity public property
     */
    public $unitQuantity;

    /**
     * Share Price for investment unit (e.g., stocks, mutual funds)
     * @var double|null $unitPrice public property
     */
    public $unitPrice;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Categorization $categorization public property
     */
    public $categorization;

    /**
     * The type of sub account from which funds came
     * @var string|null $subaccountSecurityType public property
     */
    public $subaccountSecurityType;

    /**
     * Transaction commission
     * @var integer|null $commissionAmount public property
     */
    public $commissionAmount;

    /**
     * Ticker symbol for the investment related to the transaction
     * @var string|null $ticker public property
     */
    public $ticker;

    /**
     * Finicity derived field that normalizes the transaction type from the FI
     * @var string|null $investmentTransactionType public property
     */
    public $investmentTransactionType;

    /**
     * Taxes applicable to the investment trade
     * @var integer|null $taxesAmount public property
     */
    public $taxesAmount;

    /**
     * If the foreign amount value is present then this is the currency code of that foreign amount
     * @var string|null $currencySymbol public property
     */
    public $currencySymbol;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer        $id                        Initialization value for $this->id
     * @param double         $amount                    Initialization value for $this->amount
     * @param integer        $accountId                 Initialization value for $this->accountId
     * @param integer        $customerId                Initialization value for $this->customerId
     * @param string         $status                    Initialization value for $this->status
     * @param string         $description               Initialization value for $this->description
     * @param string         $memo                      Initialization value for $this->memo
     * @param string         $postedDate                Initialization value for $this->postedDate
     * @param string         $transactionDate           Initialization value for $this->transactionDate
     * @param string         $createdDate               Initialization value for $this->createdDate
     * @param string         $type                      Initialization value for $this->type
     * @param integer        $checkNum                  Initialization value for $this->checkNum
     * @param double         $escrowAmount              Initialization value for $this->escrowAmount
     * @param double         $feeAmount                 Initialization value for $this->feeAmount
     * @param double         $interestAmount            Initialization value for $this->interestAmount
     * @param double         $principalAmount           Initialization value for $this->principalAmount
     * @param integer        $unitQuantity              Initialization value for $this->unitQuantity
     * @param double         $unitPrice                 Initialization value for $this->unitPrice
     * @param Categorization $categorization            Initialization value for $this->categorization
     * @param string         $subaccountSecurityType    Initialization value for $this->subaccountSecurityType
     * @param integer        $commissionAmount          Initialization value for $this->commissionAmount
     * @param string         $ticker                    Initialization value for $this->ticker
     * @param string         $investmentTransactionType Initialization value for $this->investmentTransactionType
     * @param integer        $taxesAmount               Initialization value for $this->taxesAmount
     * @param string         $currencySymbol            Initialization value for $this->currencySymbol
     */
    public function __construct()
    {
        if (25 == func_num_args()) {
            $this->id                        = func_get_arg(0);
            $this->amount                    = func_get_arg(1);
            $this->accountId                 = func_get_arg(2);
            $this->customerId                = func_get_arg(3);
            $this->status                    = func_get_arg(4);
            $this->description               = func_get_arg(5);
            $this->memo                      = func_get_arg(6);
            $this->postedDate                = func_get_arg(7);
            $this->transactionDate           = func_get_arg(8);
            $this->createdDate               = func_get_arg(9);
            $this->type                      = func_get_arg(10);
            $this->checkNum                  = func_get_arg(11);
            $this->escrowAmount              = func_get_arg(12);
            $this->feeAmount                 = func_get_arg(13);
            $this->interestAmount            = func_get_arg(14);
            $this->principalAmount           = func_get_arg(15);
            $this->unitQuantity              = func_get_arg(16);
            $this->unitPrice                 = func_get_arg(17);
            $this->categorization            = func_get_arg(18);
            $this->subaccountSecurityType    = func_get_arg(19);
            $this->commissionAmount          = func_get_arg(20);
            $this->ticker                    = func_get_arg(21);
            $this->investmentTransactionType = func_get_arg(22);
            $this->taxesAmount               = func_get_arg(23);
            $this->currencySymbol            = func_get_arg(24);
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
        $json['id']                        = $this->id;
        $json['amount']                    = $this->amount;
        $json['accountId']                 = $this->accountId;
        $json['customerId']                = $this->customerId;
        $json['status']                    = $this->status;
        $json['description']               = $this->description;
        $json['memo']                      = $this->memo;
        $json['postedDate']                = $this->postedDate;
        $json['transactionDate']           = $this->transactionDate;
        $json['createdDate']               = $this->createdDate;
        $json['type']                      = $this->type;
        $json['checkNum']                  = $this->checkNum;
        $json['escrowAmount']              = $this->escrowAmount;
        $json['feeAmount']                 = $this->feeAmount;
        $json['interestAmount']            = $this->interestAmount;
        $json['principalAmount']           = $this->principalAmount;
        $json['unitQuantity']              = $this->unitQuantity;
        $json['unitPrice']                 = $this->unitPrice;
        $json['categorization']            = $this->categorization;
        $json['subaccountSecurityType']    = $this->subaccountSecurityType;
        $json['commissionAmount']          = $this->commissionAmount;
        $json['ticker']                    = $this->ticker;
        $json['investmentTransactionType'] = $this->investmentTransactionType;
        $json['taxesAmount']               = $this->taxesAmount;
        $json['currencySymbol']            = $this->currencySymbol;

        return array_merge($json, $this->additionalProperties);
    }
}
