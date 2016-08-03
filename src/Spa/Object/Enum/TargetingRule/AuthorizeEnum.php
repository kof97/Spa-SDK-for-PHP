<?php 

namespace Spa\Object\Enum\TargetingRule;

/**
 * Class AuthorizeEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class AuthorizeEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const operation_type 
     */
    const OPERATION_TYPE = 'operation_type';

    /**
     * @const rule_id 
     */
    const RULE_ID = 'rule_id';

    /**
     * @const to_advertiser_id 
     */
    const TO_ADVERTISER_ID = 'to_advertiser_id';

    /**
     * @const to_rule_id 
     */
    const TO_RULE_ID = 'to_rule_id';

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
