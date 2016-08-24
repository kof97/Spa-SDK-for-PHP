<?php 

namespace Spa\Object\Enum\Targeting;

/**
 * Class ReadEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class ReadEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const targeting_id 
     */
    const TARGETING_ID = 'targeting_id';

    /**
     * Init targeting_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
