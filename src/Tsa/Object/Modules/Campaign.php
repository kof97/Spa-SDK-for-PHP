<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Campaign\Create;
use Tsa\Object\Interfaces\Campaign\Read;
use Tsa\Object\Interfaces\Campaign\Update;
use Tsa\Object\Interfaces\Campaign\Select;
use Tsa\Object\Interfaces\Campaign\SetDailyBudget;
use Tsa\Object\Interfaces\Campaign\GetCost;
use Tsa\Object\Interfaces\Campaign\Delete;
use Tsa\Object\Interfaces\Campaign\Sync;

/**
 * Class Campaign
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Campaign
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
            case 'create':
                return new Create($this->tsa, $this->mod, 'create');

            case 'read':
                return new Read($this->tsa, $this->mod, 'read');

            case 'update':
                return new Update($this->tsa, $this->mod, 'update');

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'set_daily_budget':
                return new SetDailyBudget($this->tsa, $this->mod, 'set_daily_budget');

            case 'get_cost':
                return new GetCost($this->tsa, $this->mod, 'get_cost');

            case 'delete':
                return new Delete($this->tsa, $this->mod, 'delete');

            case 'sync':
                return new Sync($this->tsa, $this->mod, 'sync');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
