<?php 

namespace Spa\Object\Enum\Campaign;

/**
 * Class GetCostEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetCostEnum
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
     * @const date 
     */
    const DATE = 'date';

    
    /**
     * Init date.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
