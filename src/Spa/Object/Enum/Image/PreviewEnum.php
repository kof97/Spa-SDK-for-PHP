<?php 

namespace Spa\Object\Enum\Image;

/**
 * Class PreviewEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class PreviewEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const image_id 
     */
    const IMAGE_ID = 'image_id';

    /**
     * @const sign 
     */
    const SIGN = 'sign';

    
    /**
     * Init sign.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
