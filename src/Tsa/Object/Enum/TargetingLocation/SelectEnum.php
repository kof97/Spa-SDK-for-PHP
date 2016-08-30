<?php 

namespace Tsa\Object\Enum\TargetingLocation;

/**
 * Class SelectEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectEnum
{
    
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
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
