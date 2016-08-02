<?php 

namespace Spa\Object\Interfaces\Payment;

use Spa\Exceptions\ParamsException;
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

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
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
                'type' => '',
            ),

            'wechat_appid' => array(
                'name' => 'wechat_appid',
                'extendType' => 'wechat_appid',
                'require' => 'yes',
                'type' => '',
            ),

            'client_ip' => array(
                'name' => 'client_ip',
                'extendType' => 'client_ip',
                'require' => 'yes',
                'type' => '',
            ),

            'notify_url' => array(
                'name' => 'notify_url',
                'extendType' => 'notify_url',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
