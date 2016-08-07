<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;
use Spa\Object\Interfaces\Adgroup\Create;
use Spa\Object\Interfaces\Adgroup\Read;
use Spa\Object\Interfaces\Adgroup\Update;
use Spa\Object\Interfaces\Adgroup\Delete;
use Spa\Object\Interfaces\Adgroup\Select;
use Spa\Object\Interfaces\Adgroup\Count;
use Spa\Object\Interfaces\Adgroup\Sync;

/**
 * Class Adgroup
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Adgroup
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
            case 'create':
                return new Create($this->spa, $this->mod, 'create');

            case 'read':
                return new Read($this->spa, $this->mod, 'read');

            case 'update':
                return new Update($this->spa, $this->mod, 'update');

            case 'delete':
                return new Delete($this->spa, $this->mod, 'delete');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'count':
                return new Count($this->spa, $this->mod, 'count');

            case 'sync':
                return new Sync($this->spa, $this->mod, 'sync');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
