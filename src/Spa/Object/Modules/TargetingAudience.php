<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\TargetingAudience\Create;
use Spa\Object\Interfaces\TargetingAudience\Select;
use Spa\Object\Interfaces\TargetingAudience\ReadFileStatus;
use Spa\Object\Interfaces\TargetingAudience\GetFileList;
use Spa\Object\Interfaces\TargetingAudience\Update;
use Spa\Object\Interfaces\TargetingAudience\UpdateByPb;
use Spa\Object\Interfaces\TargetingAudience\Delete;

/**
 * Class TargetingAudience
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingAudience {
    
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

            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'read_file_status':
                return new ReadFileStatus($this->spa, $this->mod, 'read_file_status');

            case 'get_file_list':
                return new GetFileList($this->spa, $this->mod, 'get_file_list');

            case 'update':
                return new Update($this->spa, $this->mod, 'update');

            case 'update_by_pb':
                return new UpdateByPb($this->spa, $this->mod, 'update_by_pb');

            case 'delete':
                return new Delete($this->spa, $this->mod, 'delete');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
