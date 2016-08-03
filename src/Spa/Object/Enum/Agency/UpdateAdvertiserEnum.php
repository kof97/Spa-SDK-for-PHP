<?php 

namespace Spa\Object\Enum\Agency;

/**
 * Class UpdateAdvertiserEnum
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateAdvertiserEnum
{
    
    /**
     * @const advertiser_id 
     */
    const ADVERTISER_ID = 'advertiser_id';

    /**
     * @const corporation_name 
     */
    const CORPORATION_NAME = 'corporation_name';

    /**
     * @const certification_image_id 
     */
    const CERTIFICATION_IMAGE_ID = 'certification_image_id';

    /**
     * @const industry_id 
     */
    const INDUSTRY_ID = 'industry_id';

    /**
     * @const qualification_image_id_list 
     */
    const QUALIFICATION_IMAGE_ID_LIST = 'qualification_image_id_list';

    /**
     * @const ad_qualification_image_id_list 
     */
    const AD_QUALIFICATION_IMAGE_ID_LIST = 'ad_qualification_image_id_list';

    /**
     * @const website 
     */
    const WEBSITE = 'website';

    /**
     * @const icp_image_id 
     */
    const ICP_IMAGE_ID = 'icp_image_id';

    /**
     * @const corporation_image_name 
     */
    const CORPORATION_IMAGE_NAME = 'corporation_image_name';

    /**
     * @const contact_person_telephone 
     */
    const CONTACT_PERSON_TELEPHONE = 'contact_person_telephone';

    /**
     * @const contact_person_mobile 
     */
    const CONTACT_PERSON_MOBILE = 'contact_person_mobile';

    
    /**
     * Init contact_person_mobile.
     */
    private function __construct()
    {
        // It should never be invoked.
    }

}

//end of script
