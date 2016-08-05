<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class GetTransactionDetailEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetTransactionDetailEnum
{
    
    /**
     * @const account_type 
     */
    const ACCOUNT_TYPE = 'account_type';

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
