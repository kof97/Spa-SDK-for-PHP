<?php 

namespace Spa\Object\Interfaces\Agency;



/**
 * Class Transfer
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Transfer {

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

            'account_type' => array(
                'name' => 'account_type',
                'extendType' => 'account_type',
                'require' => 'yes',
                'description' => '账户类型',
                'restraint' => '见 [link href='account_type_map']账户类型定义[/link]',
                'errormsg' => '账户类型不正确',
                'name' => 'account_type',
                'name' => 'account_type',
            );

            'amount' => array(
                'name' => 'amount',
                'extendType' => 'amount',
                'require' => 'yes',
                'description' => '金额',
                'restraint' => '单位为分',
                'errormsg' => '金额不正确',
                'name' => 'amount',
                'name' => 'amount',
            );

            'external_bill_no' => array(
                'name' => 'external_bill_no',
                'extendType' => 'external_bill_no',
                'require' => 'no',
                'description' => '外部订单号',
                'restraint' => '不超过35字符，需要有调用方标示前缀，且要保证在同一个广告主下唯一，如jdzt-xxx-xxx',
                'errormsg' => '外部订单号不正确',
                'name' => 'external_bill_no',
                'name' => 'external_bill_no',
            );

            'memo' => array(
                'name' => 'memo',
                'extendType' => 'memo',
                'require' => 'no',
                'description' => '备注信息',
                'restraint' => '不超过64个英文字符',
                'errormsg' => '备注信息不正确',
                'name' => 'memo',
                'name' => 'memo',
            );

            'expire_date' => array(
                'name' => 'expire_date',
                'extendType' => 'expire_date',
                'require' => 'no',
                'description' => '开始投放时间点对应的时间戳',
                'restraint' => '大于等于0，且小于end_time',
                'errormsg' => '开始投放时间不正确',
                'name' => 'expire_date',
                'name' => 'expire_date',
            );
;
    }

}

//end of script
