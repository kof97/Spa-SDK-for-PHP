<?php 

namespace Spa\Object\Enum\Campaign;

/**
 * Class DeleteEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class DeleteEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const campaign_id 
     */
    const CAMPAIGN_ID = 'campaign_id';

    
    /**
     * Init campaign_id.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
