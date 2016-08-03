<?php 

namespace Spa\Object\Enum\Campaign;

/**
 * Class UpdateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const campaign_id 
     */
    const CAMPAIGN_ID = 'campaign_id';

    /**
     * @const campaign_name 
     */
    const CAMPAIGN_NAME = 'campaign_name';

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
    private function __construct() {
        // It would never be used.
    }

}

//end of script
