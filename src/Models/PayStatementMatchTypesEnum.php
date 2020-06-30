<?php

namespace FinicityAPILib\Models;

/**
 * @todo Write general description for this enumeration
 */
class PayStatementMatchTypesEnum
{
    /**
     * Single transaction matching the net pay of the pay statement
     */
    const NET_PAY_MATCH = "NET_PAY_MATCH";

    /**
     * Multiple transactions matching up to the interview amounts if present
     */
    const SPLIT_INTERVIEW_AMOUNT_SUM_TO_NET_PAY_MATCH = "SPLIT_INTERVIEW_AMOUNT_SUM_TO_NET_PAY_MATCH";

    /**
     * Multiple transactions that sum up to the net pay and match direct deposits on the pay statement
     */
    const SPLIT_DIRECT_DEPOSIT_SUM_TO_NET_PAY_MATCH = "SPLIT_DIRECT_DEPOSIT_SUM_TO_NET_PAY_MATCH";

    /**
     * Multiple transactions were found that do not quite sum up to the net pay amount
     */
    const SPLIT_LESS_THAN_NET_PAY_SUM_TO_NET_PAY_MATCH = "SPLIT_LESS_THAN_NET_PAY_SUM_TO_NET_PAY_MATCH";

    /**
     * An inconclusive pay statement match was found
     */
    const PARTIAL = "PARTIAL";

    /**
     * No possible transactions to match to for pay date. This may be resolved by refreshing the report.
     */
    const TRANSACTION_DATE_RANGE_INVALID = "TRANSACTION_DATE_RANGE_INVALID";

    /**
     * None of the transactions match the pay statement
     */
    const NO_MATCH = "NO_MATCH";
}
