<?php 

namespace Spa\Object\Enum\TargetingAudience;

/**
 * Class DeleteEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class DeleteEnum
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
