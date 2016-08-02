<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Media\Create;
use Spa\Object\Interfaces\Media\Select;
use Spa\Object\Interfaces\Media\Read;
use Spa\Object\Interfaces\Media\Info;

/**
 * Class Media
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Media {
    
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

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'read':
                return new Read($this->spa, $this->mod, 'read');

            case 'info':
                return new Info($this->spa, $this->mod, 'info');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
