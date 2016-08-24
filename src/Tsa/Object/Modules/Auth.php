<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Auth\Ptlogin;
use Tsa\Object\Interfaces\Auth\PtloginToken;
use Tsa\Object\Interfaces\Auth\GetAccessToken;
use Tsa\Object\Interfaces\Auth\GetOpenid;

/**
 * Class Auth
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Auth
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
            case 'ptlogin':
                return new Ptlogin($this->tsa, $this->mod, 'ptlogin');

            case 'ptlogin_token':
                return new PtloginToken($this->tsa, $this->mod, 'ptlogin_token');

            case 'get_access_token':
                return new GetAccessToken($this->tsa, $this->mod, 'get_access_token');

            case 'get_openid':
                return new GetOpenid($this->tsa, $this->mod, 'get_openid');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
