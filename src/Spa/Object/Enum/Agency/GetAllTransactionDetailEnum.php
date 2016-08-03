<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class GetAllTransactionDetailEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetAllTransactionDetailEnum {
    
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
     * @const no_page 
     */
    const NO_PAGE = 'no_page';

    
    /**
     * Init no_page.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
