<?php 

namespace Spa\Object\Enum\Targeting;

/**
 * Class UpdateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const targeting_id 
     */
    const TARGETING_ID = 'targeting_id';

    /**
     * @const targeting_name 
     */
    const TARGETING_NAME = 'targeting_name';

    /**
     * @const description 
     */
    const DESCRIPTION = 'description';

    /**
     * @const targeting_setting 
     */
    const TARGETING_SETTING = 'targeting_setting';

    /**
     * Init targeting_setting.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
