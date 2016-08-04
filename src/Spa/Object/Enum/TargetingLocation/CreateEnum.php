<?php 

namespace Spa\Object\Enum\TargetingLocation;

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
     * @const location_type 
     */
    const LOCATION_TYPE = 'location_type';

    /**
     * @const location_name 
     */
    const LOCATION_NAME = 'location_name';

    /**
     * @const location_spec 
     */
    const LOCATION_SPEC = 'location_spec';

    /**
     * @const city_id 
     */
    const CITY_ID = 'city_id';

    /**
     * Init city_id.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
