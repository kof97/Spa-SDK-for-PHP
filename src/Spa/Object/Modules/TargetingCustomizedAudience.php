<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\TargetingCustomizedAudience\Create;
use Spa\Object\Interfaces\TargetingCustomizedAudience\Read;
use Spa\Object\Interfaces\TargetingCustomizedAudience\Select;
use Spa\Object\Interfaces\TargetingCustomizedAudience\Authorize;
use Spa\Object\Interfaces\TargetingCustomizedAudience\GetAuthorizationList;
use Spa\Object\Interfaces\TargetingCustomizedAudience\Append;

/**
 * Class TargetingCustomizedAudience
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingCustomizedAudience {
    
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
