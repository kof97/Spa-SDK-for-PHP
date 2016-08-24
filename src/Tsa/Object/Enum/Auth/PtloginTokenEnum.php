<?php 

namespace Spa\Object\Enum\Auth;

/**
 * Class PtloginTokenEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class PtloginTokenEnum
{
    
    /**
     * @const app_id 
     */
    const APP_ID = 'app_id';

    /**
     * @const app_key 
     */
    const APP_KEY = 'app_key';

    /**
     * @const qq 
     */
    const QQ = 'qq';

    /**
     * @const skey 
     */
    const SKEY = 'skey';

    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * Init advertiser_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
