<?php 

namespace Spa\Object\Enum\TargetingCustomizedAudience;

/**
 * Class ReadEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const audience_id 
     */
    const AUDIENCE_ID = 'audience_id';

    /**
     * Init audience_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
