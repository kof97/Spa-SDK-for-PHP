<?php 

namespace Tsa\Object\Enum\Adgroup;

/**
 * Class UpdateEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const adgroup_id 
     */
    const ADGROUP_ID = 'adgroup_id';

    /**
     * @const targeting_id 
     */
    const TARGETING_ID = 'targeting_id';

    /**
     * @const adgroup_name 
     */
    const ADGROUP_NAME = 'adgroup_name';

    /**
     * @const bid_amount 
     */
    const BID_AMOUNT = 'bid_amount';

    /**
     * @const begin_date 
     */
    const BEGIN_DATE = 'begin_date';

    /**
     * @const end_date 
     */
    const END_DATE = 'end_date';

    /**
     * @const time_series 
     */
    const TIME_SERIES = 'time_series';

    /**
     * @const creative_selection_type 
     */
    const CREATIVE_SELECTION_TYPE = 'creative_selection_type';

    /**
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

    /**
     * @const customized_category 
     */
    const CUSTOMIZED_CATEGORY = 'customized_category';

    /**
     * @const min_impression_include 
     */
    const MIN_IMPRESSION_INCLUDE = 'min_impression_include';

    /**
     * @const max_impression_include 
     */
    const MAX_IMPRESSION_INCLUDE = 'max_impression_include';

    /**
     * @const click_tracking_url 
     */
    const CLICK_TRACKING_URL = 'click_tracking_url';

    /**
     * @const subordinate_product_refs_id 
     */
    const SUBORDINATE_PRODUCT_REFS_ID = 'subordinate_product_refs_id';

    /**
     * @const dynamic_creative_recommend_type 
     */
    const DYNAMIC_CREATIVE_RECOMMEND_TYPE = 'dynamic_creative_recommend_type';

    /**
     * @const total_budget 
     */
    const TOTAL_BUDGET = 'total_budget';

    /**
     * Init total_budget.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
