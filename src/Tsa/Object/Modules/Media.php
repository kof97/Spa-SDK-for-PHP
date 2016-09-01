<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Media\Create;
use Tsa\Object\Interfaces\Media\Select;
use Tsa\Object\Interfaces\Media\Read;
use Tsa\Object\Interfaces\Media\Info;

/**
 * Class Media
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Media
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

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'read':
                return new Read($this->tsa, $this->mod, 'read');

            case 'info':
                return new Info($this->tsa, $this->mod, 'info');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
