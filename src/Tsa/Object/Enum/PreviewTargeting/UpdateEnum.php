<?php 

namespace Tsa\Object\Enum\PreviewTargeting;

/**
 * Class UpdateEnum
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const adgroup_id 
     */
    const ADGROUP_ID = 'adgroup_id';

    /**
     * @const preview_qq_list 
     */
    const PREVIEW_QQ_LIST = 'preview_qq_list';

    /**
     * Init preview_qq_list.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
