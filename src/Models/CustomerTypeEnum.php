<?php

namespace FinicityAPILib\Models;

/**
 * The type of Finicity Customer
 */
class CustomerTypeEnum
{
    /**
     * An active customer is a billable customer that can add real institution accounts
     */
    const ACTIVE = "active";

    /**
     * A testing customer is a non billable customer that is limited to only adding account for finbank
     * type institutions
     */
    const TESTING = "testing";
}
