<?php

namespace FinicityAPILib\Models;

/**
 * The enumeration of supported account types
 */
class AccountTypeEnum
{
    /**
     * Standard checking
     */
    const CHECKING = "checking";

    /**
     * Standard savings
     */
    const SAVINGS = "savings";

    /**
     * Certificates of deposit
     */
    const CD = "cd";

    /**
     * Money Market
     */
    const MONEYMARKET = "moneyMarket";

    /**
     * Standard credit cards
     */
    const CREDITCARD = "creditCard";

    /**
     * Home equity,line of credit
     */
    const LINEOFCREDIT = "lineOfCredit";

    /**
     * Generic investment (no details)
     */
    const INVESTMENT = "investment";

    /**
     * Generic tax-advantaged investment (no details)
     */
    const INVESTMENTTAXDEFERRED = "investmentTaxDeferred";

    /**
     * ESPP, Employee Stock Ownership Plans (ESOP), Stock Purchase Plans
     */
    const EMPLOYEESTOCKPURCHASEPLAN = "employeeStockPurchasePlan";

    /**
     * Individual Retirement Account (not Rollover or Roth)
     */
    const IRA = "ira";

    /**
     * 401K Plan
     */
    const 401K = "401k";

    /**
     * Roth IRA, Roth 401K
     */
    const ROTH = "roth";

    /**
     * 403B Plan
     */
    const 403B = "403b";

    /**
     * 529 Plan (True value s 529)
     */
    const 529PLAN = "529plan";

    /**
     * Rollover IRA
     */
    const ROLLOVER = "rollover";

    /**
     * Uniform Gifts to Minors Act
     */
    const UGMA = "ugma";

    /**
     * Uniform Transfers to Minors Act
     */
    const UTMA = "utma";

    /**
     * Keogh Plan
     */
    const KEOGH = "keogh";

    /**
     * 457 Plan (True value is 457)
     */
    const 457PLAN = "457plan";

    /**
     * 401A Plan
     */
    const 401A = "401a";

    /**
     * Standard Mortgages
     */
    const MORTGAGE = "mortgage";

    /**
     * Auto loans, equity loans, other loans
     */
    const LOAN = "loan";

    /**
     * Type cannot be determined
     */
    const UNKNOWN = "unknown";
}
