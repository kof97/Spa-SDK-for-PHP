<?php 

namespace Tsa\Object\Enum\Image;

/**
 * Class CreateByUrlEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateByUrlEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const image_url 
     */
    const IMAGE_URL = 'image_url';

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
