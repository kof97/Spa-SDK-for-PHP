<?php 

namespace Spa\Object\Enum\TargetingLocation;

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
     * @const location_id 
     */
    const LOCATION_ID = 'location_id';

    
    /**
     * Init location_id.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
