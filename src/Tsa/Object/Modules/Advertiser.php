<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Advertiser\Signup;
use Tsa\Object\Interfaces\Advertiser\Read;
use Tsa\Object\Interfaces\Advertiser\Sync;

/**
 * Class Advertiser
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Advertiser
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
            case 'signup':
                return new Signup($this->tsa, $this->mod, 'signup');

            case 'read':
                return new Read($this->tsa, $this->mod, 'read');

            case 'sync':
                return new Sync($this->tsa, $this->mod, 'sync');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
