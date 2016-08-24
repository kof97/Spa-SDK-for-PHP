<?php 

namespace Tsa\Object\Enum\TargetingCustomizedAudience;

/**
 * Class AppendEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class AppendEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const audience_id 
     */
    const AUDIENCE_ID = 'audience_id';

    /**
     * @const data_file 
     */
    const DATA_FILE = 'data_file';

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
