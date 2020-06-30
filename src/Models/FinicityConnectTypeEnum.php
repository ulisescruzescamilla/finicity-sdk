<?php

namespace FinicityAPILib\Models;

/**
 * @todo Write general description for this enumeration
 */
class FinicityConnectTypeEnum
{
    /**
     * Aggregation Only - Used by PFM (Personal Financial Management) partners to grant access to a
     * customer’s transactions.
     */
    const AGGREGATION = "aggregation";

    /**
     * TODO: Write general description for this element
     */
    const ACH = "ach";

    /**
     * Fix - Used to resolve authentication errors
     */
    const FIX = "fix";

    /**
     * Lite - Provides FI authentication and adding accounts. Allows for custom styling, control of the FI
     * search experience, and does not end with a report generation call.
     */
    const LITE = "lite";

    /**
     * Verification of Assets - Used by lenders to verify assets. The default time period of data retrieved
     * is 6 months, so that lenders can reduce their liability.
     */
    const VOA = "voa";

    /**
     * Verification of Assets with History - Used by the GSEs to verify assets. This differs from normal
     * VOA in that it uses up to 2 years of data. voahistory
     */
    const VOAHISTORY = "voahistory";

    /**
     * Verification of Income - Used by lenders to verify a customer’s income using their bank transaction
     * history.
     */
    const VOI = "voi";

    /**
     * TODO: Write general description for this element
     */
    const VOIE_TXVERIFY = "voieTxVerify";

    /**
     * TODO: Write general description for this element
     */
    const VOIESTATEMENT = "voieStatement";

    /**
     * TODO: Write general description for this element
     */
    const PAYSTATEMENT = "payStatement";

    /**
     * TODO: Write general description for this element
     */
    const ASSETSUMMARY = "assetSummary";

    /**
     * TODO: Write general description for this element
     */
    const PREQUALVOA = "preQualVoa";
}
