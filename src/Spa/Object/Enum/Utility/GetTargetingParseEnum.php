<?php 

namespace Spa\Object\Enum\Utility;

/**
 * Class GetTargetingParseEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetTargetingParseEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const targeting_id 
     */
    const TARGETING_ID = 'targeting_id';

    /**
     * @const targeting_setting 
     */
    const TARGETING_SETTING = 'targeting_setting';

    
    /**
     * Init targeting_setting.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
