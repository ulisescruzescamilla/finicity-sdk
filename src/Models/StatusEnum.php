<?php

namespace FinicityAPILib\Models;

/**
 * @todo Write general description for this enumeration
 */
class StatusEnum
{
    /**
     * "active” means that the most-recent deposit occurred as expected by the cadence and the next
     * expected date is still in the future.
     */
    const ACTIVE = "ACTIVE";

    /**
     * "inactive" means that the deposit has not occurred in the expected cadence or has not occurred
     * recently
     */
    const INACTIVE = "INACTIVE";
}
