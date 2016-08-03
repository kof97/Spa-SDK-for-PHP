<?php 

namespace Spa\Object\Enum\Report;

/**
 * Class SelectAdvertiserHourlyEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectAdvertiserHourlyEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const date 
     */
    const DATE = 'date';

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
    private function __construct() {
        // It would never be used.
    }

}

//end of script
