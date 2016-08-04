<?php 

namespace Spa\Object\Enum\Utility;

/**
 * Class GetEstimationEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetEstimationEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const targeting_setting 
     */
    const TARGETING_SETTING = 'targeting_setting';

    /**
     * @const adgroup_setting 
     */
    const ADGROUP_SETTING = 'adgroup_setting';

    /**
     * @const creative_setting 
     */
    const CREATIVE_SETTING = 'creative_setting';

    /**
     * Init creative_setting.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
