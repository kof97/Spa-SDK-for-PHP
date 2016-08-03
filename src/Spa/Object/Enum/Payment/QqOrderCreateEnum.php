<?php 

namespace Spa\Object\Enum\Payment;

/**
 * Class QqOrderCreateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class QqOrderCreateEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const amount 
     */
    const AMOUNT = 'amount';

    /**
     * @const qq 
     */
    const QQ = 'qq';

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
