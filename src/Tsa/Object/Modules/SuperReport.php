<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;
use Spa\Object\Interfaces\SuperReport\SelectAdgroupDaily;
use Spa\Object\Interfaces\SuperReport\SelectAdgroupHourly;
use Spa\Object\Interfaces\SuperReport\SelectCampaignDaily;
use Spa\Object\Interfaces\SuperReport\SelectCampaignHourly;

/**
 * Class SuperReport
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SuperReport
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
            case 'select_adgroup_daily':
                return new SelectAdgroupDaily($this->spa, $this->mod, 'select_adgroup_daily');

            case 'select_adgroup_hourly':
                return new SelectAdgroupHourly($this->spa, $this->mod, 'select_adgroup_hourly');

            case 'select_campaign_daily':
                return new SelectCampaignDaily($this->spa, $this->mod, 'select_campaign_daily');

            case 'select_campaign_hourly':
                return new SelectCampaignHourly($this->spa, $this->mod, 'select_campaign_hourly');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
