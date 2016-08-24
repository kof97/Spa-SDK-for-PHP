<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Account\Select;
use Tsa\Object\Interfaces\Account\GetTransactionDetail;
use Tsa\Object\Interfaces\Account\SetDailyBudget;
use Tsa\Object\Interfaces\Account\GetDailyInvoice;
use Tsa\Object\Interfaces\Account\GetCost;
use Tsa\Object\Interfaces\Account\CheckPaipaiWhiteList;

/**
 * Class Account
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Account
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
            case 'select':
                return new Select($this->tsa, $this->mod, 'select');

            case 'get_transaction_detail':
                return new GetTransactionDetail($this->tsa, $this->mod, 'get_transaction_detail');

            case 'set_daily_budget':
                return new SetDailyBudget($this->tsa, $this->mod, 'set_daily_budget');

            case 'get_daily_invoice':
                return new GetDailyInvoice($this->tsa, $this->mod, 'get_daily_invoice');

            case 'get_cost':
                return new GetCost($this->tsa, $this->mod, 'get_cost');

            case 'check_paipai_white_list':
                return new CheckPaipaiWhiteList($this->tsa, $this->mod, 'check_paipai_white_list');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
