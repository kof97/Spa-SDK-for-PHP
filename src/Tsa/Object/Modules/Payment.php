<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Payment\WechatOrderCreate;
use Tsa\Object\Interfaces\Payment\WechatOrderQuery;
use Tsa\Object\Interfaces\Payment\QqOrderCreate;
use Tsa\Object\Interfaces\Payment\QqOrderQuery;

/**
 * Class Payment
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Payment
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
            case 'wechat_order_create':
                return new WechatOrderCreate($this->tsa, $this->mod, 'wechat_order_create');

            case 'wechat_order_query':
                return new WechatOrderQuery($this->tsa, $this->mod, 'wechat_order_query');

            case 'qq_order_create':
                return new QqOrderCreate($this->tsa, $this->mod, 'qq_order_create');

            case 'qq_order_query':
                return new QqOrderQuery($this->tsa, $this->mod, 'qq_order_query');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
