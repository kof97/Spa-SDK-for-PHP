<?php 

namespace Tsa\Object\Enum\Targeting;

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
     * @const targeting_name 
     */
    const TARGETING_NAME = 'targeting_name';

    /**
     * @const description 
     */
    const DESCRIPTION = 'description';

    /**
     * @const ui_visibility 
     */
    const UI_VISIBILITY = 'ui_visibility';

    /**
     * @const targeting_setting 
     */
    const TARGETING_SETTING = 'targeting_setting';

    /**
     * @const outer_targeting_id 
     */
    const OUTER_TARGETING_ID = 'outer_targeting_id';

    /**
     * Init outer_targeting_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
