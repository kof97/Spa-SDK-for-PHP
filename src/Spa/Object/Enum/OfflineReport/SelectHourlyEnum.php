<?php 

namespace Spa\Object\Enum\OfflineReport;

/**
 * Class SelectHourlyEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectHourlyEnum
{
    
    /**
     * @const task 
     */
    const TASK = 'task';

    /**
     * @const date 
     */
    const DATE = 'date';

    /**
     * @const hour 
     */
    const HOUR = 'hour';

    
    /**
     * Init hour.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
