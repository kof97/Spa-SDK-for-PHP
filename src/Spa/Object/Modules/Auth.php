<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Auth\Ptlogin;
use Spa\Object\Interfaces\Auth\PtloginToken;
use Spa\Object\Interfaces\Auth\GetAccessToken;
use Spa\Object\Interfaces\Auth\GetOpenid;

/**
 * Class Auth
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Auth
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
            case 'ptlogin':
                return new Ptlogin($this->spa, $this->mod, 'ptlogin');

            case 'ptlogin_token':
                return new PtloginToken($this->spa, $this->mod, 'ptlogin_token');

            case 'get_access_token':
                return new GetAccessToken($this->spa, $this->mod, 'get_access_token');

            case 'get_openid':
                return new GetOpenid($this->spa, $this->mod, 'get_openid');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
