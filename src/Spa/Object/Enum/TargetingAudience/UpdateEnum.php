<?php 

namespace Spa\Object\Enum\TargetingAudience;

/**
 * Class UpdateEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateEnum {
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const audience_id 
     */
    const AUDIENCE_ID = 'audience_id';

    /**
     * @const audience_name 
     */
    const AUDIENCE_NAME = 'audience_name';

    /**
     * @const description 
     */
    const DESCRIPTION = 'description';

    /**
     * @const operation_type 
     */
    const OPERATION_TYPE = 'operation_type';

    /**
     * @const data_type 
     */
    const DATA_TYPE = 'data_type';

    /**
     * @const data_file 
     */
    const DATA_FILE = 'data_file';

    /**
     * @const file_name 
     */
    const FILE_NAME = 'file_name';

    /**
     * @const file_md5 
     */
    const FILE_MD5 = 'file_md5';

    /**
     * @const refs_app_id 
     */
    const REFS_APP_ID = 'refs_app_id';

    
    /**
     * Init refs_app_id.
     */
    private function __construct() {
        // It would never be used.
    }

}

//end of script
