<?php 

namespace Tsa\Object\Enum\TargetingRule;

/**
 * Class UpdateCustomAudienceEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateCustomAudienceEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const rule_id 
     */
    const RULE_ID = 'rule_id';

    /**
     * @const rule_name 
     */
    const RULE_NAME = 'rule_name';

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
