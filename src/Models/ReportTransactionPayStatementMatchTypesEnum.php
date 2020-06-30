<?php

namespace FinicityAPILib\Models;

/**
 * Pay Statement matches found at the transaction level
 */
class ReportTransactionPayStatementMatchTypesEnum
{
    /**
     * The transaction date matched the date on the pay statement
     */
    const DATE = "DATE";

    /**
     * The transaction amount matched the net pay amount on the pay statement
     */
    const NET_AMOUNT = "NET_AMOUNT";

    /**
     * The transaction amount matched the net pay amount the consumer entered during the Connect interview
     * process.
     */
    const INTERVIEW_AMOUNT = "INTERVIEW_AMOUNT";

    /**
     * The transaction amount was less than the net pay amount on the pay statement
     */
    const LESS_THAN_NET_PAY = "LESS_THAN_NET_PAY";

    /**
     * The transaction description included a match to the employer name that was on the pay statement
     */
    const EMPLOYER_NAME = "EMPLOYER_NAME";

    /**
     * The income stream type was paycheck
     */
    const INCOME_STREAM_PAYCHECK = "INCOME_STREAM_PAYCHECK";

    /**
     * The transaction amount matched the direct deposit amount on the pay statement
     */
    const DIRECT_DEPOSIT_AMOUNT = "DIRECT_DEPOSIT_AMOUNT";

    /**
     * The transaction description included a match to the payroll provider name that was on the pay
     * statement
     */
    const PAYROLL_PROVIDER = "PAYROLL_PROVIDER";
}
