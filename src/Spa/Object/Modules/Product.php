<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Product\Create;
use Spa\Object\Interfaces\Product\Read;
use Spa\Object\Interfaces\Product\Update;
use Spa\Object\Interfaces\Product\Sync;

/**
 * Class Product
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Product {
    
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

            case 'read':
                return new Read($this->spa, $this->mod, 'read');

            case 'update':
                return new Update($this->spa, $this->mod, 'update');

            case 'sync':
                return new Sync($this->spa, $this->mod, 'sync');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
