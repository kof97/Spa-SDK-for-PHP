<?php 

namespace Spa\Object\Enum\TargetingCustomizedAudience;

/**
 * Class AuthorizeEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class AuthorizeEnum
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
     * @const authorized_advertiser_id 
     */
    const AUTHORIZED_ADVERTISER_ID = 'authorized_advertiser_id';

    /**
     * @const operation_type 
     */
    const OPERATION_TYPE = 'operation_type';

    /**
     * @const description 
     */
    const DESCRIPTION = 'description';

    
    /**
     * Init description.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
