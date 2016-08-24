<?php 

namespace Tsa\Object\Enum\Creative;

/**
 * Class SyncEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class SyncEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const creative_id 
     */
    const CREATIVE_ID = 'creative_id';

    /**
     * @const outer_creative_id 
     */
    const OUTER_CREATIVE_ID = 'outer_creative_id';

    /**
     * @const campaign_id 
     */
    const CAMPAIGN_ID = 'campaign_id';

    /**
     * @const adgroup_id 
     */
    const ADGROUP_ID = 'adgroup_id';

    /**
     * @const creative_name 
     */
    const CREATIVE_NAME = 'creative_name';

    /**
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

    /**
     * @const creative_template_id 
     */
    const CREATIVE_TEMPLATE_ID = 'creative_template_id';

    /**
     * @const creative_elements 
     */
    const CREATIVE_ELEMENTS = 'creative_elements';

    /**
     * @const destination_url 
     */
    const DESTINATION_URL = 'destination_url';

    /**
     * @const impression_tracking_url 
     */
    const IMPRESSION_TRACKING_URL = 'impression_tracking_url';

    /**
     * @const outer_version 
     */
    const OUTER_VERSION = 'outer_version';

    /**
     * Init outer_version.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
