<?php 

namespace Spa\Object\Enum\Media;

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
     * @const media_file 
     */
    const MEDIA_FILE = 'media_file';

    /**
     * @const media_signature 
     */
    const MEDIA_SIGNATURE = 'media_signature';

    /**
     * @const media_description 
     */
    const MEDIA_DESCRIPTION = 'media_description';

    /**
     * Init media_description.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
