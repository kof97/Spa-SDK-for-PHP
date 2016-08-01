<?php 

namespace Spa\Object\Interfaces\Payment;



/**
 * Class WechatOrderQuery
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class WechatOrderQuery {

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

        $this->method = 'GET';

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

            'wechat_appid' => array(
                'name' => 'wechat_appid',
                'extendType' => 'wechat_appid',
                'require' => 'yes',
                'description' => '微信开放平台账户appid',
                'restraint' => '在开放平台查看，标识申请的应用',
                'errormsg' => '微信开放平台账户appid错误',
                'name' => 'wechat_appid',
                'name' => 'wechat_appid',
            );

            'out_trade_no' => array(
                'name' => 'out_trade_no',
                'extendType' => 'out_trade_no',
                'require' => 'no',
                'description' => '订单号码',
                'restraint' => '最多32个字符',
                'errormsg' => '订单号码错误',
                'name' => 'out_trade_no',
                'name' => 'out_trade_no',
            );
;
    }

}

//end of script
