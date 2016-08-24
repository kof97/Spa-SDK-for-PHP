<?php 

namespace Tsa\Object\Modules;

use Tsa\Exceptions\InterfaceException;
use Tsa\Object\Interfaces\Agency\InnerTransfer;
use Tsa\Object\Interfaces\Agency\GetFinancialOverview;
use Tsa\Object\Interfaces\Agency\GetTransactionDetail;
use Tsa\Object\Interfaces\Agency\GetAllTransactionDetail;
use Tsa\Object\Interfaces\Agency\Transfer;
use Tsa\Object\Interfaces\Agency\TransferBack;
use Tsa\Object\Interfaces\Agency\AddAdvertiser;
use Tsa\Object\Interfaces\Agency\UpdateAdvertiser;
use Tsa\Object\Interfaces\Agency\GetAdvertiserList;
use Tsa\Object\Interfaces\Agency\RealtimeCost;

/**
 * Class Agency
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Agency
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
            case 'inner_transfer':
                return new InnerTransfer($this->tsa, $this->mod, 'inner_transfer');

            case 'get_financial_overview':
                return new GetFinancialOverview($this->tsa, $this->mod, 'get_financial_overview');

            case 'get_transaction_detail':
                return new GetTransactionDetail($this->tsa, $this->mod, 'get_transaction_detail');

            case 'get_all_transaction_detail':
                return new GetAllTransactionDetail($this->tsa, $this->mod, 'get_all_transaction_detail');

            case 'transfer':
                return new Transfer($this->tsa, $this->mod, 'transfer');

            case 'transfer_back':
                return new TransferBack($this->tsa, $this->mod, 'transfer_back');

            case 'add_advertiser':
                return new AddAdvertiser($this->tsa, $this->mod, 'add_advertiser');

            case 'update_advertiser':
                return new UpdateAdvertiser($this->tsa, $this->mod, 'update_advertiser');

            case 'get_advertiser_list':
                return new GetAdvertiserList($this->tsa, $this->mod, 'get_advertiser_list');

            case 'realtime_cost':
                return new RealtimeCost($this->tsa, $this->mod, 'realtime_cost');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
