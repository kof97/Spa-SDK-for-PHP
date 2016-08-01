<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\PreviewTargeting\Create;
use Spa\Object\Interfaces\PreviewTargeting\Update;
use Spa\Object\Interfaces\PreviewTargeting\Select;

/**
 * Class PreviewTargeting
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class PreviewTargeting {
    
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
    public function __construct($spa, $mod) {
        $this->spa = $spa;

        $this->mod = $mod;
    }
    
    public function __get($interface) {
        switch ($interface) {
            case 'create':
                return new Create($this->spa, $this->mod, 'create');

            case 'update':
                return new Update($this->spa, $this->mod, 'update');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
