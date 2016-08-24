<?php 

namespace Tsa\Object;

use Tsa\Exceptions\ModuleException;
use Tsa\Object\Modules\Advertiser;
use Tsa\Object\Modules\Account;
use Tsa\Object\Modules\Campaign;
use Tsa\Object\Modules\Adgroup;
use Tsa\Object\Modules\Creative;
use Tsa\Object\Modules\Targeting;
use Tsa\Object\Modules\TargetingRule;
use Tsa\Object\Modules\Media;
use Tsa\Object\Modules\Report;
use Tsa\Object\Modules\OfflineReport;
use Tsa\Object\Modules\SuperReport;
use Tsa\Object\Modules\Agency;
use Tsa\Object\Modules\Utility;
use Tsa\Object\Modules\Auth;
use Tsa\Object\Modules\Image;
use Tsa\Object\Modules\Product;
use Tsa\Object\Modules\Payment;
use Tsa\Object\Modules\TargetingCustomizedAudience;
use Tsa\Object\Modules\TargetingAudience;
use Tsa\Object\Modules\PreviewTargeting;
use Tsa\Object\Modules\TargetingLocation;

/**
 * Class Modules
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Modules
{
    
    /**
     * Instance of Tsa.
     */
    protected $tsa;
    
    /**
     * Init .
     */
    public function __construct($tsa)
    {
        $this->tsa = $tsa;
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
                return new Advertiser($this->tsa, 'advertiser');

            case 'account':
                return new Account($this->tsa, 'account');

            case 'campaign':
                return new Campaign($this->tsa, 'campaign');

            case 'adgroup':
                return new Adgroup($this->tsa, 'adgroup');

            case 'creative':
                return new Creative($this->tsa, 'creative');

            case 'targeting':
                return new Targeting($this->tsa, 'targeting');

            case 'targeting_rule':
                return new TargetingRule($this->tsa, 'targeting_rule');

            case 'media':
                return new Media($this->tsa, 'media');

            case 'report':
                return new Report($this->tsa, 'report');

            case 'offline_report':
                return new OfflineReport($this->tsa, 'offline_report');

            case 'super_report':
                return new SuperReport($this->tsa, 'super_report');

            case 'agency':
                return new Agency($this->tsa, 'agency');

            case 'utility':
                return new Utility($this->tsa, 'utility');

            case 'auth':
                return new Auth($this->tsa, 'auth');

            case 'image':
                return new Image($this->tsa, 'image');

            case 'product':
                return new Product($this->tsa, 'product');

            case 'payment':
                return new Payment($this->tsa, 'payment');

            case 'targeting_customized_audience':
                return new TargetingCustomizedAudience($this->tsa, 'targeting_customized_audience');

            case 'targeting_audience':
                return new TargetingAudience($this->tsa, 'targeting_audience');

            case 'preview_targeting':
                return new PreviewTargeting($this->tsa, 'preview_targeting');

            case 'targeting_location':
                return new TargetingLocation($this->tsa, 'targeting_location');

            default:
                throw new ModuleException("Could not find the module called $mod");
        }
    }
}

//end of script
