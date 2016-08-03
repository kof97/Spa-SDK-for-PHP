<?php 

namespace Spa\Object\Enum\Payment;

/**
 * Class WechatOrderQueryEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class WechatOrderQueryEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const wechat_appid 
     */
    const WECHAT_APPID = 'wechat_appid';

    /**
     * @const out_trade_no 
     */
    const OUT_TRADE_NO = 'out_trade_no';

    
    /**
     * Init out_trade_no.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
