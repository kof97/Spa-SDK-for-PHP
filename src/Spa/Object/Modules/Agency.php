<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;

use Spa\Object\Interfaces\Agency\InnerTransfer;
use Spa\Object\Interfaces\Agency\GetFinancialOverview;
use Spa\Object\Interfaces\Agency\GetTransactionDetail;
use Spa\Object\Interfaces\Agency\GetAllTransactionDetail;
use Spa\Object\Interfaces\Agency\Transfer;
use Spa\Object\Interfaces\Agency\TransferBack;
use Spa\Object\Interfaces\Agency\AddAdvertiser;
use Spa\Object\Interfaces\Agency\UpdateAdvertiser;
use Spa\Object\Interfaces\Agency\GetAdvertiserList;
use Spa\Object\Interfaces\Agency\RealtimeCost;

/**
 * Class Agency
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Agency {
    
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
            case 'inner_transfer':
                return new InnerTransfer($this->spa, $this->mod, 'inner_transfer');

            case 'get_financial_overview':
                return new GetFinancialOverview($this->spa, $this->mod, 'get_financial_overview');

            case 'get_transaction_detail':
                return new GetTransactionDetail($this->spa, $this->mod, 'get_transaction_detail');

            case 'get_all_transaction_detail':
                return new GetAllTransactionDetail($this->spa, $this->mod, 'get_all_transaction_detail');

            case 'transfer':
                return new Transfer($this->spa, $this->mod, 'transfer');

            case 'transfer_back':
                return new TransferBack($this->spa, $this->mod, 'transfer_back');

            case 'add_advertiser':
                return new AddAdvertiser($this->spa, $this->mod, 'add_advertiser');

            case 'update_advertiser':
                return new UpdateAdvertiser($this->spa, $this->mod, 'update_advertiser');

            case 'get_advertiser_list':
                return new GetAdvertiserList($this->spa, $this->mod, 'get_advertiser_list');

            case 'realtime_cost':
                return new RealtimeCost($this->spa, $this->mod, 'realtime_cost');

            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }
}

//end of script
