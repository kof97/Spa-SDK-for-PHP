<?php 

namespace Spa\Object\Interfaces\Account;



/**
 * Class SetDailyBudget
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SetDailyBudget {

    /**
     * Instance of Spa.
     */
    protected $spa;

    /**
     * HTTP method.
     */
    protected $method;

    /**
     * The request endpoint.
     */
    protected $endpoint;

    protected $name;

    protected $title;


    /**
     * Init .
     */
    public function __construct($spa, $mod, $act) {

        $this->spa = $spa;

        $this->method = 'POST';

        $this->endpoint = $mod . '/' . $act;

    }

    public function send($params = array(), $headers = array()) {

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'advertiser_id' => array(
                'name' => 'advertiser_id',
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'daily_budget',
                'require' => 'yes',
                'description' => '日限额，单位为分',
                'restraint' => '大于5000，且小于1000000000。账户日限额修改规则:1. 日限额的范围是50元-1000万元（请注意转换为分）2. 日限额的修改幅度不能低于50元（请注意转换为分）3. 日限额的最低金额不能低于账户今日消耗加上50元（请注意转换为分）',
                'errormsg' => '日消耗限额不正确',
                'name' => 'daily_budget',
                'name' => 'daily_budget',
            );
;
    }

}

//end of script
