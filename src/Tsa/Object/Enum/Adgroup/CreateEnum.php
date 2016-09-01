<?php 

namespace Tsa\Object\Enum\Adgroup;

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
     * @const campaign_id 
     */
    const CAMPAIGN_ID = 'campaign_id';

    /**
     * @const targeting_id 
     */
    const TARGETING_ID = 'targeting_id';

    /**
     * @const adgroup_name 
     */
    const ADGROUP_NAME = 'adgroup_name';

    /**
     * @const bid_type 
     */
    const BID_TYPE = 'bid_type';

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
     * @const site_set 
     */
    const SITE_SET = 'site_set';

    /**
     * @const outer_adgroup_id 
     */
    const OUTER_ADGROUP_ID = 'outer_adgroup_id';

    /**
     * @const time_series 
     */
    const TIME_SERIES = 'time_series';

    /**
     * @const product_type 
     */
    const PRODUCT_TYPE = 'product_type';

    /**
     * @const product_refs_id 
     */
    const PRODUCT_REFS_ID = 'product_refs_id';

    /**
     * @const subordinate_product_refs_id 
     */
    const SUBORDINATE_PRODUCT_REFS_ID = 'subordinate_product_refs_id';

    /**
     * @const creative_selection_type 
     */
    const CREATIVE_SELECTION_TYPE = 'creative_selection_type';

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
     * @const creative_combination_type 
     */
    const CREATIVE_COMBINATION_TYPE = 'creative_combination_type';

    /**
     * @const dynamic_creative_recommend_type 
     */
    const DYNAMIC_CREATIVE_RECOMMEND_TYPE = 'dynamic_creative_recommend_type';

    /**
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

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
