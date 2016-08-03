<?php 

namespace Spa\Object\Enum\Payment;

/**
 * Class WechatOrderCreateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class WechatOrderCreateEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const amount 
     */
    const AMOUNT = 'amount';

    /**
     * @const wechat_appid 
     */
    const WECHAT_APPID = 'wechat_appid';

    /**
     * @const client_ip 
     */
    const CLIENT_IP = 'client_ip';

    /**
     * @const notify_url 
     */
    const NOTIFY_URL = 'notify_url';

    
    /**
     * Init notify_url.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
