<?php 

namespace Tsa\Object\Enum\Creative;

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
     * @const creative_id 
     */
    const CREATIVE_ID = 'creative_id';

    /**
     * @const creative_name 
     */
    const CREATIVE_NAME = 'creative_name';

    /**
     * @const creative_template_id 
     */
    const CREATIVE_TEMPLATE_ID = 'creative_template_id';

    /**
     * @const creative_elements 
     */
    const CREATIVE_ELEMENTS = 'creative_elements';

    /**
     * @const destination_url 
     */
    const DESTINATION_URL = 'destination_url';

    /**
     * @const impression_tracking_url 
     */
    const IMPRESSION_TRACKING_URL = 'impression_tracking_url';

    /**
     * @const dynamic_creative_template_id 
     */
    const DYNAMIC_CREATIVE_TEMPLATE_ID = 'dynamic_creative_template_id';

    /**
     * @const dynamic_creative_material_label 
     */
    const DYNAMIC_CREATIVE_MATERIAL_LABEL = 'dynamic_creative_material_label';

    /**
     * @const configured_status 
     */
    const CONFIGURED_STATUS = 'configured_status';

    /**
     * Init configured_status.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
