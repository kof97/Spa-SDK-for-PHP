<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\SuperReport\SelectAdgroupDaily;
use Tsa\Object\Interfaces\SuperReport\SelectAdgroupHourly;
use Tsa\Object\Interfaces\SuperReport\SelectCampaignDaily;
use Tsa\Object\Interfaces\SuperReport\SelectCampaignHourly;

/**
 * Class SuperReport
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class SuperReport
{
    
    /**
     * Instance of Tsa.
     */
    protected $tsa;

    /**
     * Module.
     */
    protected $mod;
    
    /**
     * Init .
     */
    public function __construct($tsa, $mod)
    {
        $this->tsa = $tsa;

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
                return new SelectAdgroupDaily($this->tsa, $this->mod, 'select_adgroup_daily');

            case 'select_adgroup_hourly':
                return new SelectAdgroupHourly($this->tsa, $this->mod, 'select_adgroup_hourly');

            case 'select_campaign_daily':
                return new SelectCampaignDaily($this->tsa, $this->mod, 'select_campaign_daily');

            case 'select_campaign_hourly':
                return new SelectCampaignHourly($this->tsa, $this->mod, 'select_campaign_hourly');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
