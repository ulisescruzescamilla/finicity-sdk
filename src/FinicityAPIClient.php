<?php

namespace FinicityAPILib;

use FinicityAPILib\Controllers;

/**
 * FinicityAPILib client class
 */
class FinicityAPIClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(
        $finicityAppKey = null,
        $finicityAppToken = null
    ) {
        Configuration::$finicityAppKey = $finicityAppKey ? $finicityAppKey : Configuration::$finicityAppKey;
        Configuration::$finicityAppToken = $finicityAppToken ? $finicityAppToken : Configuration::$finicityAppToken;
    }
    /**
     * Singleton access to Customer controller
     * @return Controllers\CustomerController The *Singleton* instance
     */
    public function getCustomer()
    {
        return Controllers\CustomerController::getInstance();
    }
    /**
     * Singleton access to Institutions controller
     * @return Controllers\InstitutionsController The *Singleton* instance
     */
    public function getInstitutions()
    {
        return Controllers\InstitutionsController::getInstance();
    }
    /**
     * Singleton access to Consumer controller
     * @return Controllers\ConsumerController The *Singleton* instance
     */
    public function getConsumer()
    {
        return Controllers\ConsumerController::getInstance();
    }
    /**
     * Singleton access to GetPortfolios controller
     * @return Controllers\GetPortfoliosController The *Singleton* instance
     */
    public function getGetPortfolios()
    {
        return Controllers\GetPortfoliosController::getInstance();
    }
    /**
     * Singleton access to Accounts controller
     * @return Controllers\AccountsController The *Singleton* instance
     */
    public function getAccounts()
    {
        return Controllers\AccountsController::getInstance();
    }
    /**
     * Singleton access to VerifyIncome controller
     * @return Controllers\VerifyIncomeController The *Singleton* instance
     */
    public function getVerifyIncome()
    {
        return Controllers\VerifyIncomeController::getInstance();
    }
    /**
     * Singleton access to Txpush controller
     * @return Controllers\TxpushController The *Singleton* instance
     */
    public function getTxpush()
    {
        return Controllers\TxpushController::getInstance();
    }
    /**
     * Singleton access to VerifyAssets controller
     * @return Controllers\VerifyAssetsController The *Singleton* instance
     */
    public function getVerifyAssets()
    {
        return Controllers\VerifyAssetsController::getInstance();
    }
    /**
     * Singleton access to Deprecated controller
     * @return Controllers\DeprecatedController The *Singleton* instance
     */
    public function getDeprecated()
    {
        return Controllers\DeprecatedController::getInstance();
    }
    /**
     * Singleton access to VerifyIncomeAndEmployment controller
     * @return Controllers\VerifyIncomeAndEmploymentController The *Singleton* instance
     */
    public function getVerifyIncomeAndEmployment()
    {
        return Controllers\VerifyIncomeAndEmploymentController::getInstance();
    }
    /**
     * Singleton access to Payments controller
     * @return Controllers\PaymentsController The *Singleton* instance
     */
    public function getPayments()
    {
        return Controllers\PaymentsController::getInstance();
    }
    /**
     * Singleton access to AccountOwner controller
     * @return Controllers\AccountOwnerController The *Singleton* instance
     */
    public function getAccountOwner()
    {
        return Controllers\AccountOwnerController::getInstance();
    }
    /**
     * Singleton access to Authentication controller
     * @return Controllers\AuthenticationController The *Singleton* instance
     */
    public function getAuthentication()
    {
        return Controllers\AuthenticationController::getInstance();
    }
    /**
     * Singleton access to Liabilities controller
     * @return Controllers\LiabilitiesController The *Singleton* instance
     */
    public function getLiabilities()
    {
        return Controllers\LiabilitiesController::getInstance();
    }
    /**
     * Singleton access to BankStatements controller
     * @return Controllers\BankStatementsController The *Singleton* instance
     */
    public function getBankStatements()
    {
        return Controllers\BankStatementsController::getInstance();
    }
    /**
     * Singleton access to Transactions controller
     * @return Controllers\TransactionsController The *Singleton* instance
     */
    public function getTransactions()
    {
        return Controllers\TransactionsController::getInstance();
    }
    /**
     * Singleton access to PayStatements controller
     * @return Controllers\PayStatementsController The *Singleton* instance
     */
    public function getPayStatements()
    {
        return Controllers\PayStatementsController::getInstance();
    }
    /**
     * Singleton access to GetReportsByCustomer controller
     * @return Controllers\GetReportsByCustomerController The *Singleton* instance
     */
    public function getGetReportsByCustomer()
    {
        return Controllers\GetReportsByCustomerController::getInstance();
    }
    /**
     * Singleton access to AppRegistrationAndOauthMigration controller
     * @return Controllers\AppRegistrationAndOauthMigrationController The *Singleton* instance
     */
    public function getAppRegistrationAndOauthMigration()
    {
        return Controllers\AppRegistrationAndOauthMigrationController::getInstance();
    }
    /**
     * Singleton access to Connect controller
     * @return Controllers\ConnectController The *Singleton* instance
     */
    public function getConnect()
    {
        return Controllers\ConnectController::getInstance();
    }
    /**
     * Singleton access to GetReportsByConsumer controller
     * @return Controllers\GetReportsByConsumerController The *Singleton* instance
     */
    public function getGetReportsByConsumer()
    {
        return Controllers\GetReportsByConsumerController::getInstance();
    }
    /**
     * Singleton access to API controller
     * @return Controllers\APIController The *Singleton* instance
     */
    public function getClient()
    {
        return Controllers\APIController::getInstance();
    }
    /**
     * Singleton access to CashFlow controller
     * @return Controllers\CashFlowController The *Singleton* instance
     */
    public function getCashFlow()
    {
        return Controllers\CashFlowController::getInstance();
    }
    /**
     * Singleton access to VerifyEmployment controller
     * @return Controllers\VerifyEmploymentController The *Singleton* instance
     */
    public function getVerifyEmployment()
    {
        return Controllers\VerifyEmploymentController::getInstance();
    }
}
