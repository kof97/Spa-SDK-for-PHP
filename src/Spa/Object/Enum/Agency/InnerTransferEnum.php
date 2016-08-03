<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class InnerTransferEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class InnerTransferEnum
{
    
    /**
     * @const account_type_from 
     */
    const ACCOUNT_TYPE_FROM = 'account_type_from';

    /**
     * @const account_type_to 
     */
    const ACCOUNT_TYPE_TO = 'account_type_to';

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
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
