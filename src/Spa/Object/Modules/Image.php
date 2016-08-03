<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Image\Create;
use Spa\Object\Interfaces\Image\CreateByUrl;
use Spa\Object\Interfaces\Image\Select;
use Spa\Object\Interfaces\Image\Read;
use Spa\Object\Interfaces\Image\Preview;

/**
 * Class Image
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Image
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

            case 'create_by_url':
                return new CreateByUrl($this->spa, $this->mod, 'create_by_url');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'read':
                return new Read($this->spa, $this->mod, 'read');

            case 'preview':
                return new Preview($this->spa, $this->mod, 'preview');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
