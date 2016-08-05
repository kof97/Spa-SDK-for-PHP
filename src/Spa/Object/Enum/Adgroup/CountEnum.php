<?php 

namespace Spa\Object\Enum\Adgroup;

/**
 * Class CountEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class CountEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const where 
     */
    const WHERE = 'where';

    /**
     * @const group_by 
     */
    const GROUP_BY = 'group_by';

    /**
     * Init group_by.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
