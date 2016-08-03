<?php 

namespace Spa\Object\Enum\Image;

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
     * @const image_file 
     */
    const IMAGE_FILE = 'image_file';

    /**
     * @const image_signature 
     */
    const IMAGE_SIGNATURE = 'image_signature';

    /**
     * @const outer_image_id 
     */
    const OUTER_IMAGE_ID = 'outer_image_id';

    
    /**
     * Init outer_image_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
