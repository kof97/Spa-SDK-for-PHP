<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\PreviewTargeting\Create;
use Tsa\Object\Interfaces\PreviewTargeting\Update;
use Tsa\Object\Interfaces\PreviewTargeting\Select;

/**
 * Class PreviewTargeting
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class PreviewTargeting
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

            case 'update':
                return new Update($this->tsa, $this->mod, 'update');

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
