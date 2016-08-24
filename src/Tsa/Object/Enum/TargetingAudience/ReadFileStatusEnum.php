<?php 

namespace Tsa\Object\Enum\TargetingAudience;

/**
 * Class ReadFileStatusEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadFileStatusEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const file_id 
     */
    const FILE_ID = 'file_id';

    /**
     * Init file_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
