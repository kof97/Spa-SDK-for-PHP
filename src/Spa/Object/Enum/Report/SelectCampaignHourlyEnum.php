<?php 

namespace Spa\Object\Enum\Report;

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
     * @const campaign_id_list 
     */
    const CAMPAIGN_ID_LIST = 'campaign_id_list';

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
    public function __construct() {
    
    }

}

//end of script
