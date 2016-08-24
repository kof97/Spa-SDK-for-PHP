<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Adgroup\Create;
use Tsa\Object\Interfaces\Adgroup\Read;
use Tsa\Object\Interfaces\Adgroup\Update;
use Tsa\Object\Interfaces\Adgroup\Delete;
use Tsa\Object\Interfaces\Adgroup\Select;
use Tsa\Object\Interfaces\Adgroup\Count;
use Tsa\Object\Interfaces\Adgroup\Sync;

/**
 * Class Adgroup
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Adgroup
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
