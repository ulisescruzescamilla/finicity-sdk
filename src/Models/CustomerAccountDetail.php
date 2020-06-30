<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *Additional customer account details. Not all data points will return for each account type. You can
 * see the account type that each data point will return for below. The data point are also subject to
 * availability by the institution.
 */
class CustomerAccountDetail implements JsonSerializable
{
    /**
     * (All Account Types) Most recent date of the following information
     * @var integer|null $postedDate public property
     */
    public $postedDate;

    /**
     * (Checking/Savings/CD/MoneyMarket) and (Mortgage/Loan)  The available balance (typically the current
     * balance with adjustments for any pending transactions)
     * @required
     * @var double $availableBalanceAmount public property
     */
    public $availableBalanceAmount;

    /**
     * (Checking/Savings/CD/MoneyMarket) Date when account was opened
     * @var integer|null $openDate public property
     */
    public $openDate;

    /**
     * (Checking/Savings/CD/MoneyMarket) Start date of period
     * @var integer|null $periodStartDate public property
     */
    public $periodStartDate;

    /**
     * End date of period
     * @var integer|null $periodEndDate public property
     */
    public $periodEndDate;

    /**
     * (Checking/Savings/CD/MoneyMarket) The APY for the current period interest rate
     * @var double|null $periodInterestRate public property
     */
    public $periodInterestRate;

    /**
     * (Checking/Savings/CD/MoneyMarket) Amount deposited in period
     * @var double|null $periodDepositAmount public property
     */
    public $periodDepositAmount;

    /**
     * (Checking/Savings/CD/MoneyMarket) Interest accrued during the current period
     * @var double|null $periodInterestAmount public property
     */
    public $periodInterestAmount;

    /**
     * (Checking/Savings/CD/MoneyMarket) Interest accrued year-to-date
     * @var double|null $interestYtdAmount public property
     */
    public $interestYtdAmount;

    /**
     * (Checking/Savings/CD/MoneyMarket) Interest earned in prior year
     * @var double|null $interestPriorYtdAmount public property
     */
    public $interestPriorYtdAmount;

    /**
     * (Checking/Savings/CD/MoneyMarket) Maturity date of account type
     * @var integer|null $maturityDate public property
     */
    public $maturityDate;

    /**
     * (Credit Card/Line Of Credit) and (Mortgage/Loan) The account’s current interest rate
     * @var double|null $interestRate public property
     */
    public $interestRate;

    /**
     * (Credit Card/Line Of Credit) The available credit (typically the credit limit minus the current
     * balance)
     * @var double|null $creditAvailableAmount public property
     */
    public $creditAvailableAmount;

    /**
     * (Credit Card/Line Of Credit) The account’s credit limit
     * @var double|null $creditMaxAmount public property
     */
    public $creditMaxAmount;

    /**
     * (Credit Card/Line Of Credit) Currently available cash advance
     * @var double|null $cashAdvanceAvailableAmount public property
     */
    public $cashAdvanceAvailableAmount;

    /**
     * (Credit Card/Line Of Credit) Maximum cash advance amount
     * @var double|null $cashAdvanceMaxAmount public property
     */
    public $cashAdvanceMaxAmount;

    /**
     * (Credit Card/Line Of Credit) Balance of current cash advance
     * @var double|null $cashAdvanceBalance public property
     */
    public $cashAdvanceBalance;

    /**
     * (Credit Card/Line Of Credit) Interest rate for cash advances
     * @var double|null $cashAdvanceInterestRate public property
     */
    public $cashAdvanceInterestRate;

    /**
     * (Credit Card/Line Of Credit) and (Investment) Current balance
     * @var double|null $currentBalance public property
     */
    public $currentBalance;

    /**
     * (Credit Card/Line Of Credit) and (Mortgage/Loan) Minimum payment due
     * @var double|null $paymentMinAmount public property
     */
    public $paymentMinAmount;

    /**
     * (Credit Card/Line Of Credit) Due date for the next payment
     * @var integer|null $paymentDueDate public property
     */
    public $paymentDueDate;

    /**
     * (Credit Card/Line Of Credit) Prior balance in last statement
     * @var double|null $previousBalance public property
     */
    public $previousBalance;

    /**
     * (Credit Card/Line Of Credit) Start date of statement period
     * @var integer|null $statementStartDate public property
     */
    public $statementStartDate;

    /**
     * (Credit Card/Line Of Credit) End date of statement period
     * @var integer|null $statementEndDate public property
     */
    public $statementEndDate;

    /**
     * (Credit Card/Line Of Credit) Purchase amount of statement period
     * @var double|null $statementPurchaseAmount public property
     */
    public $statementPurchaseAmount;

    /**
     * (Credit Card/Line Of Credit) Finance amount of statement period
     * @var double|null $statementFinanceAmount public property
     */
    public $statementFinanceAmount;

    /**
     * (Credit Card/Line Of Credit) Credit amount applied in statement period
     * @var double|null $statementCreditAmount public property
     */
    public $statementCreditAmount;

    /**
     * (Credit Card/Line Of Credit) Earned reward balance
     * @var integer|null $rewardEarnedBalance public property
     */
    public $rewardEarnedBalance;

    /**
     * (Credit Card/Line Of Credit) Balance past due
     * @var double|null $pastDueAmount public property
     */
    public $pastDueAmount;

    /**
     * (Credit Card/Line Of Credit) and (Mortgage/Loan) The amount received in the last payment
     * @var double|null $lastPaymentAmount public property
     */
    public $lastPaymentAmount;

    /**
     * (Credit Card/Line Of Credit) The date of the last payment
     * @var integer|null $lastPaymentDate public property
     */
    public $lastPaymentDate;

    /**
     * (Credit Card/Line Of Credit) Balance of statement at close
     * @var double|null $statementCloseBalance public property
     */
    public $statementCloseBalance;

    /**
     * (Mortgage/Loan) Length of loan in months
     * @var integer|null $termOfMl public property
     */
    public $termOfMl;

    /**
     * (Mortgage/Loan) Holder of the mortgage or loan
     * @var string|null $mlHolderName public property
     */
    public $mlHolderName;

    /**
     * (Mortgage/Loan) Description of loan
     * @var string|null $description public property
     */
    public $description;

    /**
     * (Mortgage/Loan) Late fee charged
     * @var double|null $lateFeeAmount public property
     */
    public $lateFeeAmount;

    /**
     * (Mortgage/Loan) The amount required to payoff the loan
     * @var double|null $payoffAmount public property
     */
    public $payoffAmount;

    /**
     * (Mortgage/Loan) Date of final payment
     * @var integer|null $payoffAmountDate public property
     */
    public $payoffAmountDate;

    /**
     * (Mortgage/Loan) Original date of loan maturity
     * @var integer|null $originalMaturityDate public property
     */
    public $originalMaturityDate;

    /**
     * (Mortgage/Loan) The principal balance
     * @var double|null $principalBalance public property
     */
    public $principalBalance;

    /**
     * (Mortgage/Loan) The escrow balance
     * @var double|null $escrowBalance public property
     */
    public $escrowBalance;

    /**
     * (Mortgage/Loan) Period of interest
     * @var string|null $interestPeriod public property
     */
    public $interestPeriod;

    /**
     * (Mortgage/Loan) Original loan amount
     * @var double|null $initialMlAmount public property
     */
    public $initialMlAmount;

    /**
     * (Mortgage/Loan) Original date of loan
     * @var integer|null $initialMlDate public property
     */
    public $initialMlDate;

    /**
     * (Mortgage/Loan) Amount towards principal in next payment
     * @var double|null $nextPaymentPrincipalAmount public property
     */
    public $nextPaymentPrincipalAmount;

    /**
     * (Mortgage/Loan) Amount of interest in next payment
     * @var double|null $nextPaymentInterestAmount public property
     */
    public $nextPaymentInterestAmount;

    /**
     * (Mortgage/Loan) Minimum payment due
     * @var double|null $nextPayment public property
     */
    public $nextPayment;

    /**
     * (Mortgage/Loan) Due date for the next payment
     * @var integer|null $nextPaymentDate public property
     */
    public $nextPaymentDate;

    /**
     * (Mortgage/Loan) Due date of last payment
     * @var integer|null $lastPaymentDueDate public property
     */
    public $lastPaymentDueDate;

    /**
     * (Mortgage/Loan) The date of the last payment
     * @var integer|null $lastPaymentReceiveDate public property
     */
    public $lastPaymentReceiveDate;

    /**
     * (Mortgage/Loan) Amount towards principal in last payment
     * @var double|null $lastPaymentPrincipalAmount public property
     */
    public $lastPaymentPrincipalAmount;

    /**
     * (Mortgage/Loan) Amount of interest in last payment
     * @var double|null $lastPaymentInterestAmount public property
     */
    public $lastPaymentInterestAmount;

    /**
     * (Mortgage/Loan) Amount towards escrow in last payment
     * @var double|null $lastPaymentEscrowAmount public property
     */
    public $lastPaymentEscrowAmount;

    /**
     * (Mortgage/Loan) Amount of last fee in last payment
     * @var double|null $lastPaymentLastFeeAmount public property
     */
    public $lastPaymentLastFeeAmount;

    /**
     * (Mortgage/Loan) Amount of late charge in last payment
     * @var double|null $lastPaymentLateCharge public property
     */
    public $lastPaymentLateCharge;

    /**
     * (Mortgage/Loan) Principal paid year-to-date
     * @var double|null $ytdPrincipalPaid public property
     */
    public $ytdPrincipalPaid;

    /**
     * (Mortgage/Loan) Interest paid year-to-date
     * @var double|null $ytdInterestPaid public property
     */
    public $ytdInterestPaid;

    /**
     * (Mortgage/Loan) Insurance paid year-to-date
     * @var double|null $ytdInsurancePaid public property
     */
    public $ytdInsurancePaid;

    /**
     * (Mortgage/Loan) Tax paid year-to-date
     * @var double|null $ytdTaxPaid public property
     */
    public $ytdTaxPaid;

    /**
     * (Mortgage/Loan) Enrolled in autopay (F/Y)
     * @var bool|null $autoPayEnrolled public property
     */
    public $autoPayEnrolled;

    /**
     * (Mortgage/Loan) Collateral on loan
     * @var string|null $collateral public property
     */
    public $collateral;

    /**
     * (Mortgage/Loan) Current school
     * @var string|null $currentSchool public property
     */
    public $currentSchool;

    /**
     * (Mortgage/Loan) First payment due date
     * @var integer|null $firstPaymentDate public property
     */
    public $firstPaymentDate;

    /**
     * (Mortgage/Loan) First mortgage (F/Y)
     * @var bool|null $firstMortgage public property
     */
    public $firstMortgage;

    /**
     * (Mortgage/Loan) Frequency of payments (monthly, etc.)
     * @var string|null $loanPaymentFreq public property
     */
    public $loanPaymentFreq;

    /**
     * (Mortgage/Loan) Original school
     * @var string|null $originalSchool public property
     */
    public $originalSchool;

    /**
     * (Mortgage/Loan) Recurring payment amount
     * @var double|null $recurringPaymentAmount public property
     */
    public $recurringPaymentAmount;

    /**
     * (Mortgage/Loan) Owner of loan
     * @var string|null $lender public property
     */
    public $lender;

    /**
     * (Mortgage/Loan) Ending balance
     * @var double|null $endingBalanceAmount public property
     */
    public $endingBalanceAmount;

    /**
     * (Mortgage/Loan) Type of loan term
     * @var string|null $loanTermType public property
     */
    public $loanTermType;

    /**
     * (Mortgage/Loan) Number of payments made
     * @var integer|null $paymentsMade public property
     */
    public $paymentsMade;

    /**
     * (Mortgage/Loan) Balloon payment amount
     * @var double|null $balloonAmount public property
     */
    public $balloonAmount;

    /**
     * (Mortgage/Loan) Projected interest on the loan
     * @var double|null $projectedInterest public property
     */
    public $projectedInterest;

    /**
     * (Mortgage/Loan) Interest paid since inception of loan (life to date)
     * @var double|null $interestPaidLtd public property
     */
    public $interestPaidLtd;

    /**
     * (Mortgage/Loan) Type of interest rate
     * @var string|null $interestRateType public property
     */
    public $interestRateType;

    /**
     * (Mortgage/Loan) Type of loan payment
     * @var string|null $loanPaymentType public property
     */
    public $loanPaymentType;

    /**
     * (Mortgage/Loan) Number of payments remaining before loan is paid off
     * @var integer|null $paymentsRemaining public property
     */
    public $paymentsRemaining;

    /**
     * (Investment) Net interest earned after deducting interest paid out
     * @var double|null $interestMarginBalance public property
     */
    public $interestMarginBalance;

    /**
     * (Investment) Sum of short balance
     * @var double|null $shortBalance public property
     */
    public $shortBalance;

    /**
     * (Investment) Amount available for cash withdrawal
     * @var double|null $availableCashBalance public property
     */
    public $availableCashBalance;

    /**
     * (Investment) amount payable to an investor at maturity
     * @var double|null $maturityValueAmount public property
     */
    public $maturityValueAmount;

    /**
     * (Investment) Vested amount in account
     * @var double|null $vestedBalance public property
     */
    public $vestedBalance;

    /**
     * (Investment) Employer matched contributions
     * @var double|null $empMatchAmount public property
     */
    public $empMatchAmount;

    /**
     * (Investment) Employer pretax contribution amount
     * @var double|null $empPretaxContribAmount public property
     */
    public $empPretaxContribAmount;

    /**
     * (Investment) Employer pretax contribution amount year to date
     * @var double|null $empPretaxContribAmountYtd public property
     */
    public $empPretaxContribAmountYtd;

    /**
     * (Investment) Total year to date contributions
     * @var double|null $contribTotalYtd public property
     */
    public $contribTotalYtd;

    /**
     * (Investment) Cash balance of account
     * @var double|null $cashBalanceAmount public property
     */
    public $cashBalanceAmount;

    /**
     * (Investment) Pre tax amount of total balance
     * @var double|null $preTaxAmount public property
     */
    public $preTaxAmount;

    /**
     * (Investment) Post tax amount of total balance
     * @var double|null $afterTaxAmount public property
     */
    public $afterTaxAmount;

    /**
     * (Investment) Amount matched
     * @var double|null $matchAmount public property
     */
    public $matchAmount;

    /**
     * (Investment) Amount of balance for profit sharing
     * @var double|null $profitSharingAmount public property
     */
    public $profitSharingAmount;

    /**
     * (Investment) Amount of balance rolled over from original account (401k, etc.)
     * @var double|null $rolloverAmount public property
     */
    public $rolloverAmount;

    /**
     * (Investment) Other vested amount
     * @var double|null $otherVestAmount public property
     */
    public $otherVestAmount;

    /**
     * (Investment) Other nonvested amount
     * @var double|null $otherNonvestAmount public property
     */
    public $otherNonvestAmount;

    /**
     * (Investment) Current loan balance
     * @var double|null $currentLoanBalance public property
     */
    public $currentLoanBalance;

    /**
     * (Investment) Interest rate of loan
     * @var double|null $loanRate public property
     */
    public $loanRate;

    /**
     * (Investment) Money available to buy securities
     * @var double|null $buyPower public property
     */
    public $buyPower;

    /**
     * (Investment) Life to date of money rolled over
     * @var double|null $rolloverLtd public property
     */
    public $rolloverLtd;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $postedDate                 Initialization value for $this->postedDate
     * @param double  $availableBalanceAmount     Initialization value for $this->availableBalanceAmount
     * @param integer $openDate                   Initialization value for $this->openDate
     * @param integer $periodStartDate            Initialization value for $this->periodStartDate
     * @param integer $periodEndDate              Initialization value for $this->periodEndDate
     * @param double  $periodInterestRate         Initialization value for $this->periodInterestRate
     * @param double  $periodDepositAmount        Initialization value for $this->periodDepositAmount
     * @param double  $periodInterestAmount       Initialization value for $this->periodInterestAmount
     * @param double  $interestYtdAmount          Initialization value for $this->interestYtdAmount
     * @param double  $interestPriorYtdAmount     Initialization value for $this->interestPriorYtdAmount
     * @param integer $maturityDate               Initialization value for $this->maturityDate
     * @param double  $interestRate               Initialization value for $this->interestRate
     * @param double  $creditAvailableAmount      Initialization value for $this->creditAvailableAmount
     * @param double  $creditMaxAmount            Initialization value for $this->creditMaxAmount
     * @param double  $cashAdvanceAvailableAmount Initialization value for $this->cashAdvanceAvailableAmount
     * @param double  $cashAdvanceMaxAmount       Initialization value for $this->cashAdvanceMaxAmount
     * @param double  $cashAdvanceBalance         Initialization value for $this->cashAdvanceBalance
     * @param double  $cashAdvanceInterestRate    Initialization value for $this->cashAdvanceInterestRate
     * @param double  $currentBalance             Initialization value for $this->currentBalance
     * @param double  $paymentMinAmount           Initialization value for $this->paymentMinAmount
     * @param integer $paymentDueDate             Initialization value for $this->paymentDueDate
     * @param double  $previousBalance            Initialization value for $this->previousBalance
     * @param integer $statementStartDate         Initialization value for $this->statementStartDate
     * @param integer $statementEndDate           Initialization value for $this->statementEndDate
     * @param double  $statementPurchaseAmount    Initialization value for $this->statementPurchaseAmount
     * @param double  $statementFinanceAmount     Initialization value for $this->statementFinanceAmount
     * @param double  $statementCreditAmount      Initialization value for $this->statementCreditAmount
     * @param integer $rewardEarnedBalance        Initialization value for $this->rewardEarnedBalance
     * @param double  $pastDueAmount              Initialization value for $this->pastDueAmount
     * @param double  $lastPaymentAmount          Initialization value for $this->lastPaymentAmount
     * @param integer $lastPaymentDate            Initialization value for $this->lastPaymentDate
     * @param double  $statementCloseBalance      Initialization value for $this->statementCloseBalance
     * @param integer $termOfMl                   Initialization value for $this->termOfMl
     * @param string  $mlHolderName               Initialization value for $this->mlHolderName
     * @param string  $description                Initialization value for $this->description
     * @param double  $lateFeeAmount              Initialization value for $this->lateFeeAmount
     * @param double  $payoffAmount               Initialization value for $this->payoffAmount
     * @param integer $payoffAmountDate           Initialization value for $this->payoffAmountDate
     * @param integer $originalMaturityDate       Initialization value for $this->originalMaturityDate
     * @param double  $principalBalance           Initialization value for $this->principalBalance
     * @param double  $escrowBalance              Initialization value for $this->escrowBalance
     * @param string  $interestPeriod             Initialization value for $this->interestPeriod
     * @param double  $initialMlAmount            Initialization value for $this->initialMlAmount
     * @param integer $initialMlDate              Initialization value for $this->initialMlDate
     * @param double  $nextPaymentPrincipalAmount Initialization value for $this->nextPaymentPrincipalAmount
     * @param double  $nextPaymentInterestAmount  Initialization value for $this->nextPaymentInterestAmount
     * @param double  $nextPayment                Initialization value for $this->nextPayment
     * @param integer $nextPaymentDate            Initialization value for $this->nextPaymentDate
     * @param integer $lastPaymentDueDate         Initialization value for $this->lastPaymentDueDate
     * @param integer $lastPaymentReceiveDate     Initialization value for $this->lastPaymentReceiveDate
     * @param double  $lastPaymentPrincipalAmount Initialization value for $this->lastPaymentPrincipalAmount
     * @param double  $lastPaymentInterestAmount  Initialization value for $this->lastPaymentInterestAmount
     * @param double  $lastPaymentEscrowAmount    Initialization value for $this->lastPaymentEscrowAmount
     * @param double  $lastPaymentLastFeeAmount   Initialization value for $this->lastPaymentLastFeeAmount
     * @param double  $lastPaymentLateCharge      Initialization value for $this->lastPaymentLateCharge
     * @param double  $ytdPrincipalPaid           Initialization value for $this->ytdPrincipalPaid
     * @param double  $ytdInterestPaid            Initialization value for $this->ytdInterestPaid
     * @param double  $ytdInsurancePaid           Initialization value for $this->ytdInsurancePaid
     * @param double  $ytdTaxPaid                 Initialization value for $this->ytdTaxPaid
     * @param bool    $autoPayEnrolled            Initialization value for $this->autoPayEnrolled
     * @param string  $collateral                 Initialization value for $this->collateral
     * @param string  $currentSchool              Initialization value for $this->currentSchool
     * @param integer $firstPaymentDate           Initialization value for $this->firstPaymentDate
     * @param bool    $firstMortgage              Initialization value for $this->firstMortgage
     * @param string  $loanPaymentFreq            Initialization value for $this->loanPaymentFreq
     * @param string  $originalSchool             Initialization value for $this->originalSchool
     * @param double  $recurringPaymentAmount     Initialization value for $this->recurringPaymentAmount
     * @param string  $lender                     Initialization value for $this->lender
     * @param double  $endingBalanceAmount        Initialization value for $this->endingBalanceAmount
     * @param string  $loanTermType               Initialization value for $this->loanTermType
     * @param integer $paymentsMade               Initialization value for $this->paymentsMade
     * @param double  $balloonAmount              Initialization value for $this->balloonAmount
     * @param double  $projectedInterest          Initialization value for $this->projectedInterest
     * @param double  $interestPaidLtd            Initialization value for $this->interestPaidLtd
     * @param string  $interestRateType           Initialization value for $this->interestRateType
     * @param string  $loanPaymentType            Initialization value for $this->loanPaymentType
     * @param integer $paymentsRemaining          Initialization value for $this->paymentsRemaining
     * @param double  $interestMarginBalance      Initialization value for $this->interestMarginBalance
     * @param double  $shortBalance               Initialization value for $this->shortBalance
     * @param double  $availableCashBalance       Initialization value for $this->availableCashBalance
     * @param double  $maturityValueAmount        Initialization value for $this->maturityValueAmount
     * @param double  $vestedBalance              Initialization value for $this->vestedBalance
     * @param double  $empMatchAmount             Initialization value for $this->empMatchAmount
     * @param double  $empPretaxContribAmount     Initialization value for $this->empPretaxContribAmount
     * @param double  $empPretaxContribAmountYtd  Initialization value for $this->empPretaxContribAmountYtd
     * @param double  $contribTotalYtd            Initialization value for $this->contribTotalYtd
     * @param double  $cashBalanceAmount          Initialization value for $this->cashBalanceAmount
     * @param double  $preTaxAmount               Initialization value for $this->preTaxAmount
     * @param double  $afterTaxAmount             Initialization value for $this->afterTaxAmount
     * @param double  $matchAmount                Initialization value for $this->matchAmount
     * @param double  $profitSharingAmount        Initialization value for $this->profitSharingAmount
     * @param double  $rolloverAmount             Initialization value for $this->rolloverAmount
     * @param double  $otherVestAmount            Initialization value for $this->otherVestAmount
     * @param double  $otherNonvestAmount         Initialization value for $this->otherNonvestAmount
     * @param double  $currentLoanBalance         Initialization value for $this->currentLoanBalance
     * @param double  $loanRate                   Initialization value for $this->loanRate
     * @param double  $buyPower                   Initialization value for $this->buyPower
     * @param double  $rolloverLtd                Initialization value for $this->rolloverLtd
     */
    public function __construct()
    {
        if (98 == func_num_args()) {
            $this->postedDate                 = func_get_arg(0);
            $this->availableBalanceAmount     = func_get_arg(1);
            $this->openDate                   = func_get_arg(2);
            $this->periodStartDate            = func_get_arg(3);
            $this->periodEndDate              = func_get_arg(4);
            $this->periodInterestRate         = func_get_arg(5);
            $this->periodDepositAmount        = func_get_arg(6);
            $this->periodInterestAmount       = func_get_arg(7);
            $this->interestYtdAmount          = func_get_arg(8);
            $this->interestPriorYtdAmount     = func_get_arg(9);
            $this->maturityDate               = func_get_arg(10);
            $this->interestRate               = func_get_arg(11);
            $this->creditAvailableAmount      = func_get_arg(12);
            $this->creditMaxAmount            = func_get_arg(13);
            $this->cashAdvanceAvailableAmount = func_get_arg(14);
            $this->cashAdvanceMaxAmount       = func_get_arg(15);
            $this->cashAdvanceBalance         = func_get_arg(16);
            $this->cashAdvanceInterestRate    = func_get_arg(17);
            $this->currentBalance             = func_get_arg(18);
            $this->paymentMinAmount           = func_get_arg(19);
            $this->paymentDueDate             = func_get_arg(20);
            $this->previousBalance            = func_get_arg(21);
            $this->statementStartDate         = func_get_arg(22);
            $this->statementEndDate           = func_get_arg(23);
            $this->statementPurchaseAmount    = func_get_arg(24);
            $this->statementFinanceAmount     = func_get_arg(25);
            $this->statementCreditAmount      = func_get_arg(26);
            $this->rewardEarnedBalance        = func_get_arg(27);
            $this->pastDueAmount              = func_get_arg(28);
            $this->lastPaymentAmount          = func_get_arg(29);
            $this->lastPaymentDate            = func_get_arg(30);
            $this->statementCloseBalance      = func_get_arg(31);
            $this->termOfMl                   = func_get_arg(32);
            $this->mlHolderName               = func_get_arg(33);
            $this->description                = func_get_arg(34);
            $this->lateFeeAmount              = func_get_arg(35);
            $this->payoffAmount               = func_get_arg(36);
            $this->payoffAmountDate           = func_get_arg(37);
            $this->originalMaturityDate       = func_get_arg(38);
            $this->principalBalance           = func_get_arg(39);
            $this->escrowBalance              = func_get_arg(40);
            $this->interestPeriod             = func_get_arg(41);
            $this->initialMlAmount            = func_get_arg(42);
            $this->initialMlDate              = func_get_arg(43);
            $this->nextPaymentPrincipalAmount = func_get_arg(44);
            $this->nextPaymentInterestAmount  = func_get_arg(45);
            $this->nextPayment                = func_get_arg(46);
            $this->nextPaymentDate            = func_get_arg(47);
            $this->lastPaymentDueDate         = func_get_arg(48);
            $this->lastPaymentReceiveDate     = func_get_arg(49);
            $this->lastPaymentPrincipalAmount = func_get_arg(50);
            $this->lastPaymentInterestAmount  = func_get_arg(51);
            $this->lastPaymentEscrowAmount    = func_get_arg(52);
            $this->lastPaymentLastFeeAmount   = func_get_arg(53);
            $this->lastPaymentLateCharge      = func_get_arg(54);
            $this->ytdPrincipalPaid           = func_get_arg(55);
            $this->ytdInterestPaid            = func_get_arg(56);
            $this->ytdInsurancePaid           = func_get_arg(57);
            $this->ytdTaxPaid                 = func_get_arg(58);
            $this->autoPayEnrolled            = func_get_arg(59);
            $this->collateral                 = func_get_arg(60);
            $this->currentSchool              = func_get_arg(61);
            $this->firstPaymentDate           = func_get_arg(62);
            $this->firstMortgage              = func_get_arg(63);
            $this->loanPaymentFreq            = func_get_arg(64);
            $this->originalSchool             = func_get_arg(65);
            $this->recurringPaymentAmount     = func_get_arg(66);
            $this->lender                     = func_get_arg(67);
            $this->endingBalanceAmount        = func_get_arg(68);
            $this->loanTermType               = func_get_arg(69);
            $this->paymentsMade               = func_get_arg(70);
            $this->balloonAmount              = func_get_arg(71);
            $this->projectedInterest          = func_get_arg(72);
            $this->interestPaidLtd            = func_get_arg(73);
            $this->interestRateType           = func_get_arg(74);
            $this->loanPaymentType            = func_get_arg(75);
            $this->paymentsRemaining          = func_get_arg(76);
            $this->interestMarginBalance      = func_get_arg(77);
            $this->shortBalance               = func_get_arg(78);
            $this->availableCashBalance       = func_get_arg(79);
            $this->maturityValueAmount        = func_get_arg(80);
            $this->vestedBalance              = func_get_arg(81);
            $this->empMatchAmount             = func_get_arg(82);
            $this->empPretaxContribAmount     = func_get_arg(83);
            $this->empPretaxContribAmountYtd  = func_get_arg(84);
            $this->contribTotalYtd            = func_get_arg(85);
            $this->cashBalanceAmount          = func_get_arg(86);
            $this->preTaxAmount               = func_get_arg(87);
            $this->afterTaxAmount             = func_get_arg(88);
            $this->matchAmount                = func_get_arg(89);
            $this->profitSharingAmount        = func_get_arg(90);
            $this->rolloverAmount             = func_get_arg(91);
            $this->otherVestAmount            = func_get_arg(92);
            $this->otherNonvestAmount         = func_get_arg(93);
            $this->currentLoanBalance         = func_get_arg(94);
            $this->loanRate                   = func_get_arg(95);
            $this->buyPower                   = func_get_arg(96);
            $this->rolloverLtd                = func_get_arg(97);
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
        $json['postedDate']                 = $this->postedDate;
        $json['availableBalanceAmount']     = $this->availableBalanceAmount;
        $json['openDate']                   = $this->openDate;
        $json['periodStartDate']            = $this->periodStartDate;
        $json['periodEndDate']              = $this->periodEndDate;
        $json['periodInterestRate']         = $this->periodInterestRate;
        $json['periodDepositAmount']        = $this->periodDepositAmount;
        $json['periodInterestAmount']       = $this->periodInterestAmount;
        $json['interestYtdAmount']          = $this->interestYtdAmount;
        $json['interestPriorYtdAmount']     = $this->interestPriorYtdAmount;
        $json['maturityDate']               = $this->maturityDate;
        $json['interestRate']               = $this->interestRate;
        $json['creditAvailableAmount']      = $this->creditAvailableAmount;
        $json['creditMaxAmount']            = $this->creditMaxAmount;
        $json['cashAdvanceAvailableAmount'] = $this->cashAdvanceAvailableAmount;
        $json['cashAdvanceMaxAmount']       = $this->cashAdvanceMaxAmount;
        $json['cashAdvanceBalance']         = $this->cashAdvanceBalance;
        $json['cashAdvanceInterestRate']    = $this->cashAdvanceInterestRate;
        $json['currentBalance']             = $this->currentBalance;
        $json['paymentMinAmount']           = $this->paymentMinAmount;
        $json['paymentDueDate']             = $this->paymentDueDate;
        $json['previousBalance']            = $this->previousBalance;
        $json['statementStartDate']         = $this->statementStartDate;
        $json['statementEndDate']           = $this->statementEndDate;
        $json['statementPurchaseAmount']    = $this->statementPurchaseAmount;
        $json['statementFinanceAmount']     = $this->statementFinanceAmount;
        $json['statementCreditAmount']      = $this->statementCreditAmount;
        $json['rewardEarnedBalance']        = $this->rewardEarnedBalance;
        $json['pastDueAmount']              = $this->pastDueAmount;
        $json['lastPaymentAmount']          = $this->lastPaymentAmount;
        $json['lastPaymentDate']            = $this->lastPaymentDate;
        $json['statementCloseBalance']      = $this->statementCloseBalance;
        $json['termOfMl']                   = $this->termOfMl;
        $json['mlHolderName']               = $this->mlHolderName;
        $json['description']                = $this->description;
        $json['lateFeeAmount']              = $this->lateFeeAmount;
        $json['payoffAmount']               = $this->payoffAmount;
        $json['payoffAmountDate']           = $this->payoffAmountDate;
        $json['originalMaturityDate']       = $this->originalMaturityDate;
        $json['principalBalance']           = $this->principalBalance;
        $json['escrowBalance']              = $this->escrowBalance;
        $json['interestPeriod']             = $this->interestPeriod;
        $json['initialMlAmount']            = $this->initialMlAmount;
        $json['initialMlDate']              = $this->initialMlDate;
        $json['nextPaymentPrincipalAmount'] = $this->nextPaymentPrincipalAmount;
        $json['nextPaymentInterestAmount']  = $this->nextPaymentInterestAmount;
        $json['nextPayment']                = $this->nextPayment;
        $json['nextPaymentDate']            = $this->nextPaymentDate;
        $json['lastPaymentDueDate']         = $this->lastPaymentDueDate;
        $json['lastPaymentReceiveDate']     = $this->lastPaymentReceiveDate;
        $json['lastPaymentPrincipalAmount'] = $this->lastPaymentPrincipalAmount;
        $json['lastPaymentInterestAmount']  = $this->lastPaymentInterestAmount;
        $json['lastPaymentEscrowAmount']    = $this->lastPaymentEscrowAmount;
        $json['lastPaymentLastFeeAmount']   = $this->lastPaymentLastFeeAmount;
        $json['lastPaymentLateCharge']      = $this->lastPaymentLateCharge;
        $json['ytdPrincipalPaid']           = $this->ytdPrincipalPaid;
        $json['ytdInterestPaid']            = $this->ytdInterestPaid;
        $json['ytdInsurancePaid']           = $this->ytdInsurancePaid;
        $json['ytdTaxPaid']                 = $this->ytdTaxPaid;
        $json['autoPayEnrolled']            = $this->autoPayEnrolled;
        $json['collateral']                 = $this->collateral;
        $json['currentSchool']              = $this->currentSchool;
        $json['firstPaymentDate']           = $this->firstPaymentDate;
        $json['firstMortgage']              = $this->firstMortgage;
        $json['loanPaymentFreq']            = $this->loanPaymentFreq;
        $json['originalSchool']             = $this->originalSchool;
        $json['recurringPaymentAmount']     = $this->recurringPaymentAmount;
        $json['lender']                     = $this->lender;
        $json['endingBalanceAmount']        = $this->endingBalanceAmount;
        $json['loanTermType']               = $this->loanTermType;
        $json['paymentsMade']               = $this->paymentsMade;
        $json['balloonAmount']              = $this->balloonAmount;
        $json['projectedInterest']          = $this->projectedInterest;
        $json['interestPaidLtd']            = $this->interestPaidLtd;
        $json['interestRateType']           = $this->interestRateType;
        $json['loanPaymentType']            = $this->loanPaymentType;
        $json['paymentsRemaining']          = $this->paymentsRemaining;
        $json['interestMarginBalance']      = $this->interestMarginBalance;
        $json['shortBalance']               = $this->shortBalance;
        $json['availableCashBalance']       = $this->availableCashBalance;
        $json['maturityValueAmount']        = $this->maturityValueAmount;
        $json['vestedBalance']              = $this->vestedBalance;
        $json['empMatchAmount']             = $this->empMatchAmount;
        $json['empPretaxContribAmount']     = $this->empPretaxContribAmount;
        $json['empPretaxContribAmountYtd']  = $this->empPretaxContribAmountYtd;
        $json['contribTotalYtd']            = $this->contribTotalYtd;
        $json['cashBalanceAmount']          = $this->cashBalanceAmount;
        $json['preTaxAmount']               = $this->preTaxAmount;
        $json['afterTaxAmount']             = $this->afterTaxAmount;
        $json['matchAmount']                = $this->matchAmount;
        $json['profitSharingAmount']        = $this->profitSharingAmount;
        $json['rolloverAmount']             = $this->rolloverAmount;
        $json['otherVestAmount']            = $this->otherVestAmount;
        $json['otherNonvestAmount']         = $this->otherNonvestAmount;
        $json['currentLoanBalance']         = $this->currentLoanBalance;
        $json['loanRate']                   = $this->loanRate;
        $json['buyPower']                   = $this->buyPower;
        $json['rolloverLtd']                = $this->rolloverLtd;

        return array_merge($json, $this->additionalProperties);
    }
}
