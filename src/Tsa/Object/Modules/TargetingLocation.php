<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\TargetingLocation\Create;
use Tsa\Object\Interfaces\TargetingLocation\Read;
use Tsa\Object\Interfaces\TargetingLocation\Select;
use Tsa\Object\Interfaces\TargetingLocation\Delete;

/**
 * Class TargetingLocation
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingLocation
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

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'delete':
                return new Delete($this->tsa, $this->mod, 'delete');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
