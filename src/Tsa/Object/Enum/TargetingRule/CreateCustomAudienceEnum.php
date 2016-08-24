<?php 

namespace Spa\Object\Enum\TargetingRule;

/**
 * Class CreateCustomAudienceEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateCustomAudienceEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const rule_name 
     */
    const RULE_NAME = 'rule_name';

    /**
     * @const rule_type 
     */
    const RULE_TYPE = 'rule_type';

    /**
     * @const description 
     */
    const DESCRIPTION = 'description';

    /**
     * Init description.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
