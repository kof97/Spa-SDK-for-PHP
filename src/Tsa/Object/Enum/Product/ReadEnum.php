<?php 

namespace Tsa\Object\Enum\Product;

/**
 * Class ReadEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadEnum
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
     * @const product_type 
     */
    const PRODUCT_TYPE = 'product_type';

    /**
     * Init product_type.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
