<?php 

namespace Tsa\Object\Enum\Auth;

/**
 * Class PtloginEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class PtloginEnum
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
     * Init skey.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
