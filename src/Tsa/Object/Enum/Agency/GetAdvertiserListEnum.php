<?php 

namespace Tsa\Object\Enum\Agency;

/**
 * Class GetAdvertiserListEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetAdvertiserListEnum
{
    
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
