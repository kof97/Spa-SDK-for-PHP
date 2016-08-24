<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Utility\GetEstimation;
use Tsa\Object\Interfaces\Utility\GetSystemLocationRegionList;
use Tsa\Object\Interfaces\Utility\GetLocationList;
use Tsa\Object\Interfaces\Utility\GetRegionList;
use Tsa\Object\Interfaces\Utility\GetShoppingInterestList;
use Tsa\Object\Interfaces\Utility\GetBusinessInterestList;
use Tsa\Object\Interfaces\Utility\GetIndustryList;
use Tsa\Object\Interfaces\Utility\IndustryTreeForAdgroup;
use Tsa\Object\Interfaces\Utility\WubaCategory;
use Tsa\Object\Interfaces\Utility\GetAppCategoryList;
use Tsa\Object\Interfaces\Utility\GetUnionMediaCategoryList;
use Tsa\Object\Interfaces\Utility\GetSubordinateProductList;
use Tsa\Object\Interfaces\Utility\GetCreativeTemplateRefs;
use Tsa\Object\Interfaces\Utility\CreativePreview;
use Tsa\Object\Interfaces\Utility\GetQzonePageList;
use Tsa\Object\Interfaces\Utility\GetTargetingParse;
use Tsa\Object\Interfaces\Utility\GetEstimationByTargetingAudience;
use Tsa\Object\Interfaces\Utility\GetDynamicRightInfo;

/**
 * Class Utility
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Utility
{
    
    /**
     * Instance of Tsa.
     */
    protected $spa;

    /**
     * Module.
     */
    protected $mod;
    
    /**
     * Init .
     */
    public function __construct($spa, $mod)
    {
        $this->spa = $spa;

        $this->mod = $mod;
    }
    
    /**
     * To get the interface instance.
     *
     * @param string $interface The interface name.
     */
    public function __get($interface)
    {
        switch ($interface) {
            case 'get_estimation':
                return new GetEstimation($this->spa, $this->mod, 'get_estimation');

            case 'get_system_location_region_list':
                return new GetSystemLocationRegionList($this->spa, $this->mod, 'get_system_location_region_list');

            case 'get_location_list':
                return new GetLocationList($this->spa, $this->mod, 'get_location_list');

            case 'get_region_list':
                return new GetRegionList($this->spa, $this->mod, 'get_region_list');

            case 'get_shopping_interest_list':
                return new GetShoppingInterestList($this->spa, $this->mod, 'get_shopping_interest_list');

            case 'get_business_interest_list':
                return new GetBusinessInterestList($this->spa, $this->mod, 'get_business_interest_list');

            case 'get_industry_list':
                return new GetIndustryList($this->spa, $this->mod, 'get_industry_list');

            case 'industry_tree_for_adgroup':
                return new IndustryTreeForAdgroup($this->spa, $this->mod, 'industry_tree_for_adgroup');

            case 'wuba_category':
                return new WubaCategory($this->spa, $this->mod, 'wuba_category');

            case 'get_app_category_list':
                return new GetAppCategoryList($this->spa, $this->mod, 'get_app_category_list');

            case 'get_union_media_category_list':
                return new GetUnionMediaCategoryList($this->spa, $this->mod, 'get_union_media_category_list');

            case 'get_subordinate_product_list':
                return new GetSubordinateProductList($this->spa, $this->mod, 'get_subordinate_product_list');

            case 'get_creative_template_refs':
                return new GetCreativeTemplateRefs($this->spa, $this->mod, 'get_creative_template_refs');

            case 'creative_preview':
                return new CreativePreview($this->spa, $this->mod, 'creative_preview');

            case 'get_qzone_page_list':
                return new GetQzonePageList($this->spa, $this->mod, 'get_qzone_page_list');

            case 'get_targeting_parse':
                return new GetTargetingParse($this->spa, $this->mod, 'get_targeting_parse');

            case 'get_estimation_by_targeting_audience':
                return new GetEstimationByTargetingAudience($this->spa, $this->mod, 'get_estimation_by_targeting_audience');

            case 'get_dynamic_right_info':
                return new GetDynamicRightInfo($this->spa, $this->mod, 'get_dynamic_right_info');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
