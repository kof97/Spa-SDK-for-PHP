<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\Create;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\Read;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\Select;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\Authorize;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\GetAuthorizationList;
use Tsa\Object\Interfaces\TargetingCustomizedAudience\Append;

/**
 * Class TargetingCustomizedAudience
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingCustomizedAudience
{
    
    /**
     * Instance of Tsa.
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

            case 'read':
                return new Read($this->spa, $this->mod, 'read');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'authorize':
                return new Authorize($this->spa, $this->mod, 'authorize');

            case 'get_authorization_list':
                return new GetAuthorizationList($this->spa, $this->mod, 'get_authorization_list');

            case 'append':
                return new Append($this->spa, $this->mod, 'append');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
