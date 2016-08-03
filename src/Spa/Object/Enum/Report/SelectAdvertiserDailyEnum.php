<?php 

namespace Spa\Object\Enum\Report;

/**
 * Class SelectAdvertiserDailyEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectAdvertiserDailyEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const date_range 
     */
    const DATE_RANGE = 'date_range';

    /**
     * @const page 
     */
    const PAGE = 'page';

    /**
     * @const page_size 
     */
    const PAGE_SIZE = 'page_size';

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
