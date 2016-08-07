<?php 

namespace Spa\Object\Enum\Account;

/**
 * Class SetDailyBudgetEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SetDailyBudgetEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const daily_budget 
     */
    const DAILY_BUDGET = 'daily_budget';

    /**
     * Init daily_budget.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
