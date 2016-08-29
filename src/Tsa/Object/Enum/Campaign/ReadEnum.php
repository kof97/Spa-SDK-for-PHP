<?php 

namespace Tsa\Object\Enum\Campaign;

/**
 * Class ReadEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadEnum
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
     * Init campaign_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
