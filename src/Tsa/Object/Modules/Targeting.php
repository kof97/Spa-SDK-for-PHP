<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Targeting\Create;
use Tsa\Object\Interfaces\Targeting\Read;
use Tsa\Object\Interfaces\Targeting\Update;
use Tsa\Object\Interfaces\Targeting\Delete;
use Tsa\Object\Interfaces\Targeting\Sync;
use Tsa\Object\Interfaces\Targeting\Select;

/**
 * Class Targeting
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Targeting
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

            case 'sync':
                return new Sync($this->spa, $this->mod, 'sync');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
