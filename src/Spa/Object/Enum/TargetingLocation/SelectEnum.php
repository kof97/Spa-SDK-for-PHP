<?php 

namespace Spa\Object\Enum\TargetingLocation;

/**
 * Class SelectEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const page 
     */
    const PAGE = 'page';

    /**
     * @const page_size 
     */
    const PAGE_SIZE = 'page_size';

    /**
     * @const filter 
     */
    const FILTER = 'filter';

    
    /**
     * Init filter.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
