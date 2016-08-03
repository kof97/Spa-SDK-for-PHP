<?php 

namespace Spa\Object\Enum\Auth;

/**
 * Class PtloginEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class PtloginEnum {
    
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
    private function __construct() {
        // It would never be used.
    }

}

//end of script
