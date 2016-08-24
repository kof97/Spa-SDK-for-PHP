<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;
use Spa\Object\Interfaces\Report\SelectAdvertiserDaily;
use Spa\Object\Interfaces\Report\SelectAdvertiserHourly;
use Spa\Object\Interfaces\Report\SelectAdgroupDaily;
use Spa\Object\Interfaces\Report\SelectAdgroupHourly;
use Spa\Object\Interfaces\Report\SelectCampaignDaily;
use Spa\Object\Interfaces\Report\SelectCampaignHourly;
use Spa\Object\Interfaces\Report\SelectGender;
use Spa\Object\Interfaces\Report\SelectGenderAdvertiser;
use Spa\Object\Interfaces\Report\SelectAge;
use Spa\Object\Interfaces\Report\SelectAgeAdvertiser;
use Spa\Object\Interfaces\Report\SelectRegion;
use Spa\Object\Interfaces\Report\SelectRegionAdvertiser;

/**
 * Class Report
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Report
{
    
    /**
     * Instance of Spa.
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
            case 'select_advertiser_daily':
                return new SelectAdvertiserDaily($this->spa, $this->mod, 'select_advertiser_daily');

            case 'select_advertiser_hourly':
                return new SelectAdvertiserHourly($this->spa, $this->mod, 'select_advertiser_hourly');

            case 'select_adgroup_daily':
                return new SelectAdgroupDaily($this->spa, $this->mod, 'select_adgroup_daily');

            case 'select_adgroup_hourly':
                return new SelectAdgroupHourly($this->spa, $this->mod, 'select_adgroup_hourly');

            case 'select_campaign_daily':
                return new SelectCampaignDaily($this->spa, $this->mod, 'select_campaign_daily');

            case 'select_campaign_hourly':
                return new SelectCampaignHourly($this->spa, $this->mod, 'select_campaign_hourly');

            case 'select_gender':
                return new SelectGender($this->spa, $this->mod, 'select_gender');

            case 'select_gender_advertiser':
                return new SelectGenderAdvertiser($this->spa, $this->mod, 'select_gender_advertiser');

            case 'select_age':
                return new SelectAge($this->spa, $this->mod, 'select_age');

            case 'select_age_advertiser':
                return new SelectAgeAdvertiser($this->spa, $this->mod, 'select_age_advertiser');

            case 'select_region':
                return new SelectRegion($this->spa, $this->mod, 'select_region');

            case 'select_region_advertiser':
                return new SelectRegionAdvertiser($this->spa, $this->mod, 'select_region_advertiser');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
