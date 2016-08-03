<?php 

namespace Spa\Object\Enum\Adgroup;

/**
 * Class ReadEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const adgroup_id 
     */
    const ADGROUP_ID = 'adgroup_id';

    
    /**
     * Init adgroup_id.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
