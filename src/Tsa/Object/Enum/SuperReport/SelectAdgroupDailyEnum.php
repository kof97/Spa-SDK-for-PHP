<?php 

namespace Tsa\Object\Enum\SuperReport;

/**
 * Class SelectAdgroupDailyEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectAdgroupDailyEnum
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
     * @const filter 
     */
    const FILTER = 'filter';

    /**
     * @const order_by 
     */
    const ORDER_BY = 'order_by';

    /**
     * @const group_by 
     */
    const GROUP_BY = 'group_by';

    /**
     * @const page 
     */
    const PAGE = 'page';

    /**
     * @const page_size 
     */
    const PAGE_SIZE = 'page_size';

    /**
     * Init page_size.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
