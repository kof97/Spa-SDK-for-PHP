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

            case 'read':
                return new Read($this->tsa, $this->mod, 'read');

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'authorize':
                return new Authorize($this->tsa, $this->mod, 'authorize');

            case 'get_authorization_list':
                return new GetAuthorizationList($this->tsa, $this->mod, 'get_authorization_list');

            case 'append':
                return new Append($this->tsa, $this->mod, 'append');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
