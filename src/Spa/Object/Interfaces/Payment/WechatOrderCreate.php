<?php 

namespace Spa\Object\Interfaces\Payment;

use Spa\Object\Detector\FieldsDetector;

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

    /**
     * Init .
     */
    public function __construct($spa, $mod, $act) {
        $this->spa = $spa;

        $this->method = 'POST';

        $this->endpoint = $mod . '/' . $act;
    }

    /**
     * Send a request.
     *
     * @param array $params  The request params.
     * @param array $headers The request headers.
     * @return Response
     */
    public function send($params = array(), $headers = array()) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    /**
     * Send a request with the user's token.
     *
     * @param array $params       The request params.
     * @param array $headers      The request headers.
     * @param array $access_token The user's access token.
     * @return Response
     */
    public function sendWithAccessToken($params = array(), $headers = array(), $access_token = null) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

        return $response;
    }

    /**
     * The fields info.
     */
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
