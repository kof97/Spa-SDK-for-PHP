<?php 

namespace Tsa\Object\Enum\Product;

/**
 * Class SyncEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class SyncEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const product_refs_id 
     */
    const PRODUCT_REFS_ID = 'product_refs_id';

    /**
     * @const product_name 
     */
    const PRODUCT_NAME = 'product_name';

    /**
     * @const product_type 
     */
    const PRODUCT_TYPE = 'product_type';

    /**
     * @const product_info 
     */
    const PRODUCT_INFO = 'product_info';

    /**
     * @const outer_version 
     */
    const OUTER_VERSION = 'outer_version';

    /**
     * Init outer_version.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
