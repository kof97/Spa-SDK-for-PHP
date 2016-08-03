<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class TransferBackEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class TransferBackEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const account_type 
     */
    const ACCOUNT_TYPE = 'account_type';

    /**
     * @const outer_advertiser_id 
     */
    const OUTER_ADVERTISER_ID = 'outer_advertiser_id';

    /**
     * @const amount 
     */
    const AMOUNT = 'amount';

    /**
     * @const external_bill_no 
     */
    const EXTERNAL_BILL_NO = 'external_bill_no';

    /**
     * @const memo 
     */
    const MEMO = 'memo';

    
    /**
     * Init memo.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
