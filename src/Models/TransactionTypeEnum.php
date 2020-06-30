<?php

namespace FinicityAPILib\Models;

/**
 * If provided by the institution, the following values may be returned in the field of a record:
 */
class TransactionTypeEnum
{
    /**
     * ATM debit or credit (depends on signage of amount)
     */
    const ATM = "atm";

    /**
     * Cash withdrawal
     */
    const CASH = "cash";

    /**
     * Check
     */
    const CHECK = "check";

    /**
     * Generic credit
     */
    const CREDIT = "credit";

    /**
     * Generic debit
     */
    const DEBIT = "debit";

    /**
     * Deposit
     */
    const DEPOSIT = "deposit";

    /**
     * Merchant initiated debit
     */
    const DIRECTDEBIT = "directDebit";

    /**
     * Direct deposit
     */
    const DIRECTDEPOSIT = "directDeposit";

    /**
     * Dividend
     */
    const DIVIDEND = "dividend";

    /**
     * Institution fee
     */
    const FEE = "fee";

    /**
     * Interest earned or paid (depends on signage of amount)
     */
    const INTEREST = "interest";

    /**
     * Type is not known or doesn’t match types available in this list
     */
    const OTHER = "other";

    /**
     * Electronic payment
     */
    const PAYMENT = "payment";

    /**
     * Point of sale debit or credit (depends on signage of amount)
     */
    const POINTOFSALE = "pointOfSale";

    /**
     * Repeating payment/standing order
     */
    const REPEATPAYMENT = "repeatPayment";

    /**
     * Service charge
     */
    const SERVICECHARGE = "serviceCharge";

    /**
     * Transfer
     */
    const TRANSFER = "transfer";
}
