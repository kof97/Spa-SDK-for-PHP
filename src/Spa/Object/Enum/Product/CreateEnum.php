<?php 

namespace Spa\Object\Enum\Product;

/**
 * Class CreateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateEnum
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
     * Init product_info.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
