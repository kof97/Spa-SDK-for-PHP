<?php 

namespace Tsa\Object\Enum\Campaign;

/**
 * Class CreateEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const campaign_name 
     */
    const CAMPAIGN_NAME = 'campaign_name';

    /**
     * @const campaign_type 
     */
    const CAMPAIGN_TYPE = 'campaign_type';

    /**
     * @const daily_budget 
     */
    const DAILY_BUDGET = 'daily_budget';

    /**
     * @const total_budget 
     */
    const TOTAL_BUDGET = 'total_budget';

    /**
     * @const speed_mode 
     */
    const SPEED_MODE = 'speed_mode';

    /**
     * @const pv_demanded 
     */
    const PV_DEMANDED = 'pv_demanded';

    /**
     * @const outer_campaign_id 
     */
    const OUTER_CAMPAIGN_ID = 'outer_campaign_id';

    /**
     * @const retainability_in_feeds 
     */
    const RETAINABILITY_IN_FEEDS = 'retainability_in_feeds';

    /**
     * @const max_impression_include 
     */
    const MAX_IMPRESSION_INCLUDE = 'max_impression_include';

    /**
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

    /**
     * Init configured_status.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
