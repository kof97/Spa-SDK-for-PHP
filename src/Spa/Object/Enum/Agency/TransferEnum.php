<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class TransferEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class TransferEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const account_type 
     */
    const ACCOUNT_TYPE = 'account_type';

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
     * @const expire_date 
     */
    const EXPIRE_DATE = 'expire_date';

    
    /**
     * Init expire_date.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
