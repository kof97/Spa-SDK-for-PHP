<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Image\Create;
use Tsa\Object\Interfaces\Image\CreateByUrl;
use Tsa\Object\Interfaces\Image\Select;
use Tsa\Object\Interfaces\Image\Read;
use Tsa\Object\Interfaces\Image\Preview;

/**
 * Class Image
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Image
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

            case 'create_by_url':
                return new CreateByUrl($this->tsa, $this->mod, 'create_by_url');

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'read':
                return new Read($this->tsa, $this->mod, 'read');

            case 'preview':
                return new Preview($this->tsa, $this->mod, 'preview');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
