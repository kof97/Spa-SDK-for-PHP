<?php 

namespace Spa\Object\Interfaces\Payment;

use Spa\Exceptions\ParamsException;

/**
 * Class WechatOrderCreate
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class WechatOrderCreate {

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

        $this->validateField($params);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }

        $data = $this->fieldInfo();

        // validate the required field
        $this->validateRequireField($data, $params);

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

            $type = $data[$key]['type'];
            switch ($type) {
                case 'string':
                    $this->validateString($data[$key], $key, $value);
                    break;

                case 'integer':
                    
                    break;

                case 'id':

                case 'number':
                    
                    break;

                case 'struct':
                    
                    break;

                case 'array':
                    
                    break;

                default: break;
            }
        }
    }

    protected function validateString($data, $key, $value) {
        $len = strlen($value);
        if (isset(($max_length = $data['max_length'])) {
            if ($len > $max_length) {
                throw new ParamsException("The field '$key' expect the max length is '$max_length'");
            }
        }

        if (isset(($min_length = $data['min_length'])) {
            if ($len < $min_length) {
                throw new ParamsException("The field '$key' expect the min length is '$min_length'");
            }
        }
    }

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                throw new ParamsException("Expect the required params '$key' that you didn't provide");
            }
        }
    }

    public function fieldInfo() {
        return array(

            'advertiser_id' => array(
                'name' => 'advertiser_id',
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'max' => '4294967296',
                'min' => '0',
            ),

            'amount' => array(
                'name' => 'amount',
                'extendType' => 'amount',
                'require' => 'yes',
                'type' => 'id',
                'description' => '支付金额',
                'restraint' => '单位为分,限额100000-1000000',
                'errormsg' => '支付金额错误',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'wechat_appid' => array(
                'name' => 'wechat_appid',
                'extendType' => 'wechat_appid',
                'require' => 'yes',
                'type' => 'string',
                'description' => '微信开放平台账户appid',
                'restraint' => '在开放平台查看，标识申请的应用',
                'errormsg' => '微信开放平台账户appid错误',
                'max_length' => '32',
                'min_length' => '1',
            ),

            'client_ip' => array(
                'name' => 'client_ip',
                'extendType' => 'client_ip',
                'require' => 'yes',
                'type' => 'string',
                'description' => '客户端IP',
                'restraint' => 'APP支付的客户端IP',
                'errormsg' => '客户端IP',
                'max_length' => '20',
                'min_length' => '1',
                'pattern' => '/^(\d{1,3}\.){3}\d{1,3}(:\d{1,5})?$/',
            ),

            'notify_url' => array(
                'name' => 'notify_url',
                'extendType' => 'notify_url',
                'require' => 'no',
                'type' => 'string',
                'description' => '成功支付通知地址',
                'restraint' => '由开发者自定义，微信支付成功之后，广点通后台通知（POST）开发者服务器（notify_url）支付结果，参数：out_trade_no=订单号,pay_type=WX',
                'errormsg' => '通知地址错误',
                'max_length' => '1024',
                'min_length' => '0',
                'pattern' => '{url_pattern}',
            ),

        );
    }

}

//end of script
