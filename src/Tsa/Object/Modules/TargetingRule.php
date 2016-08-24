<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\TargetingRule\CreateCustomAudience;
use Tsa\Object\Interfaces\TargetingRule\ReadCustomAudience;
use Tsa\Object\Interfaces\TargetingRule\UpdateCustomAudience;
use Tsa\Object\Interfaces\TargetingRule\Delete;
use Tsa\Object\Interfaces\TargetingRule\Select;
use Tsa\Object\Interfaces\TargetingRule\Upload;
use Tsa\Object\Interfaces\TargetingRule\Authorize;
use Tsa\Object\Interfaces\TargetingRule\AuthorizationList;

/**
 * Class TargetingRule
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingRule
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
            case 'create_custom_audience':
                return new CreateCustomAudience($this->spa, $this->mod, 'create_custom_audience');

            case 'read_custom_audience':
                return new ReadCustomAudience($this->spa, $this->mod, 'read_custom_audience');

            case 'update_custom_audience':
                return new UpdateCustomAudience($this->spa, $this->mod, 'update_custom_audience');

            case 'delete':
                return new Delete($this->spa, $this->mod, 'delete');

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'upload':
                return new Upload($this->spa, $this->mod, 'upload');

            case 'authorize':
                return new Authorize($this->spa, $this->mod, 'authorize');

            case 'authorization_list':
                return new AuthorizationList($this->spa, $this->mod, 'authorization_list');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
