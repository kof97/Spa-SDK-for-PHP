<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\TargetingAudience\Create;
use Tsa\Object\Interfaces\TargetingAudience\Select;
use Tsa\Object\Interfaces\TargetingAudience\ReadFileStatus;
use Tsa\Object\Interfaces\TargetingAudience\GetFileList;
use Tsa\Object\Interfaces\TargetingAudience\Update;
use Tsa\Object\Interfaces\TargetingAudience\UpdateByPb;
use Tsa\Object\Interfaces\TargetingAudience\Delete;

/**
 * Class TargetingAudience
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class TargetingAudience
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

            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'read_file_status':
                return new ReadFileStatus($this->tsa, $this->mod, 'read_file_status');

            case 'get_file_list':
                return new GetFileList($this->tsa, $this->mod, 'get_file_list');

            case 'update':
                return new Update($this->tsa, $this->mod, 'update');

            case 'update_by_pb':
                return new UpdateByPb($this->tsa, $this->mod, 'update_by_pb');

            case 'delete':
                return new Delete($this->tsa, $this->mod, 'delete');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
