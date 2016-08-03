<?php 

namespace Spa\Object\Enum\TargetingAudience;

/**
 * Class UpdateByPbEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateByPbEnum
{
    
    /**
     * @const operation_type 
     */
    const OPERATION_TYPE = 'operation_type';

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
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
