<?php 

namespace Spa\Object\Enum\SuperReport;

/**
 * Class SelectCampaignHourlyEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectCampaignHourlyEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const date 
     */
    const DATE = 'date';

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
    private function __construct() {
        // It would never be used.
    }

}

//end of script
