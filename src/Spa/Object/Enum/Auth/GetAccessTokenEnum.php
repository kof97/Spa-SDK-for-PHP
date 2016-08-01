<?php 

namespace Spa\Object\Enum\Auth;

/**
 * Class GetAccessTokenEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetAccessTokenEnum {
    
    /**
     * @const app_id 
     */
    const APP_ID = 'app_id';

    /**
     * @const app_key 
     */
    const APP_KEY = 'app_key';

    /**
     * @const authorization_code 
     */
    const AUTHORIZATION_CODE = 'authorization_code';

    
    /**
     * Init authorization_code.
     */
    public function __construct() {
    
    }

}

//end of script
