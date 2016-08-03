<?php 

namespace Spa\Object\Enum\Report;

/**
 * Class SelectAgeEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectAgeEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const date_range 
     */
    const DATE_RANGE = 'date_range';

    /**
     * @const campaign_id_list 
     */
    const CAMPAIGN_ID_LIST = 'campaign_id_list';

    /**
     * @const adgroup_id_list 
     */
    const ADGROUP_ID_LIST = 'adgroup_id_list';

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
