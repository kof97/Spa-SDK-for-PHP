<?php 

namespace Spa\Object;

use Spa\Exceptions\ModuleException;
use Spa\Object\Modules\Advertiser;
use Spa\Object\Modules\Account;
use Spa\Object\Modules\Campaign;
use Spa\Object\Modules\Adgroup;
use Spa\Object\Modules\Creative;
use Spa\Object\Modules\Targeting;
use Spa\Object\Modules\TargetingRule;
use Spa\Object\Modules\Media;
use Spa\Object\Modules\Report;
use Spa\Object\Modules\OfflineReport;
use Spa\Object\Modules\SuperReport;
use Spa\Object\Modules\Agency;
use Spa\Object\Modules\Utility;
use Spa\Object\Modules\Auth;
use Spa\Object\Modules\Image;
use Spa\Object\Modules\Product;
use Spa\Object\Modules\Payment;
use Spa\Object\Modules\TargetingCustomizedAudience;
use Spa\Object\Modules\TargetingAudience;
use Spa\Object\Modules\PreviewTargeting;
use Spa\Object\Modules\TargetingLocation;

/**
 * Class Modules
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Modules
{
    
    /**
     * Instance of Spa.
     */
    protected $spa;
    
    /**
     * Init .
     */
    public function __construct($spa)
    {
        $this->spa = $spa;
    }
    
    /**
     * To get the module instance.
     *
     * @param string $mod The mod name.
     */
    public function __get($mod)
    {
        switch ($mod) {
            case 'advertiser':
                return new Advertiser($this->spa, 'advertiser');

            case 'account':
                return new Account($this->spa, 'account');

            case 'campaign':
                return new Campaign($this->spa, 'campaign');

            case 'adgroup':
                return new Adgroup($this->spa, 'adgroup');

            case 'creative':
                return new Creative($this->spa, 'creative');

            case 'targeting':
                return new Targeting($this->spa, 'targeting');

            case 'targeting_rule':
                return new TargetingRule($this->spa, 'targeting_rule');

            case 'media':
                return new Media($this->spa, 'media');

            case 'report':
                return new Report($this->spa, 'report');

            case 'offline_report':
                return new OfflineReport($this->spa, 'offline_report');

            case 'super_report':
                return new SuperReport($this->spa, 'super_report');

            case 'agency':
                return new Agency($this->spa, 'agency');

            case 'utility':
                return new Utility($this->spa, 'utility');

            case 'auth':
                return new Auth($this->spa, 'auth');

            case 'image':
                return new Image($this->spa, 'image');

            case 'product':
                return new Product($this->spa, 'product');

            case 'payment':
                return new Payment($this->spa, 'payment');

            case 'targeting_customized_audience':
                return new TargetingCustomizedAudience($this->spa, 'targeting_customized_audience');

            case 'targeting_audience':
                return new TargetingAudience($this->spa, 'targeting_audience');

            case 'preview_targeting':
                return new PreviewTargeting($this->spa, 'preview_targeting');

            case 'targeting_location':
                return new TargetingLocation($this->spa, 'targeting_location');

            default:
                throw new ModuleException("Could not find the module called $mod");
        }
    }
}

//end of script
