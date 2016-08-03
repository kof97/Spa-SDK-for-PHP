<?php 

namespace Spa\Object\Enum\Campaign;

/**
 * Class SyncEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SyncEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const campaign_id 
     */
    const CAMPAIGN_ID = 'campaign_id';

    /**
     * @const outer_campaign_id 
     */
    const OUTER_CAMPAIGN_ID = 'outer_campaign_id';

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
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

    /**
     * @const begin_date 
     */
    const BEGIN_DATE = 'begin_date';

    /**
     * @const end_date 
     */
    const END_DATE = 'end_date';

    /**
     * @const site_set 
     */
    const SITE_SET = 'site_set';

    /**
     * @const time_series 
     */
    const TIME_SERIES = 'time_series';

    /**
     * @const speed_mode 
     */
    const SPEED_MODE = 'speed_mode';

    /**
     * @const outer_version 
     */
    const OUTER_VERSION = 'outer_version';

    
    /**
     * Init outer_version.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
