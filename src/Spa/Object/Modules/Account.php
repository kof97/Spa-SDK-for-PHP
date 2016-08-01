<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Account\Select;
use Spa\Object\Interfaces\Account\GetTransactionDetail;
use Spa\Object\Interfaces\Account\SetDailyBudget;
use Spa\Object\Interfaces\Account\GetDailyInvoice;
use Spa\Object\Interfaces\Account\GetCost;
use Spa\Object\Interfaces\Account\CheckPaipaiWhiteList;

/**
 * Class Account
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Account {
    
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
            case 'select':
                return new Select($this->spa, $this->mod, 'select');

            case 'get_transaction_detail':
                return new GetTransactionDetail($this->spa, $this->mod, 'get_transaction_detail');

            case 'set_daily_budget':
                return new SetDailyBudget($this->spa, $this->mod, 'set_daily_budget');

            case 'get_daily_invoice':
                return new GetDailyInvoice($this->spa, $this->mod, 'get_daily_invoice');

            case 'get_cost':
                return new GetCost($this->spa, $this->mod, 'get_cost');

            case 'check_paipai_white_list':
                return new CheckPaipaiWhiteList($this->spa, $this->mod, 'check_paipai_white_list');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
