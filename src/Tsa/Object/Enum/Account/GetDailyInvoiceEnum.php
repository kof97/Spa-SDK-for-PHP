<?php 

namespace Tsa\Object\Enum\Account;

/**
 * Class GetDailyInvoiceEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetDailyInvoiceEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const account_type 
     */
    const ACCOUNT_TYPE = 'account_type';

    /**
     * @const trade_type 
     */
    const TRADE_TYPE = 'trade_type';

    /**
     * @const date_range 
     */
    const DATE_RANGE = 'date_range';

    /**
     * @const page 
     */
    const PAGE = 'page';

    /**
     * @const page_size 
     */
    const PAGE_SIZE = 'page_size';

    /**
     * Init page_size.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
