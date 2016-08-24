<?php 

namespace Spa\Object\Enum\TargetingRule;

/**
 * Class UploadEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UploadEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const data_source 
     */
    const DATA_SOURCE = 'data_source';

    /**
     * @const file_md5 
     */
    const FILE_MD5 = 'file_md5';

    /**
     * Init file_md5.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
