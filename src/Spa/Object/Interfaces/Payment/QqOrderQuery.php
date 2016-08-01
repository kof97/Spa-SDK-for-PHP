<?php 

namespace Spa\Object\Interfaces\Payment;



/**
 * Class QqOrderQuery
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class QqOrderQuery {

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

    protected function validateField($params) {
        $data = $this->fieldInfo();

        foreach ($params as $key => $value) {
            
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

            'out_trade_no' => array(
                'name' => 'out_trade_no',
                'extendType' => 'out_trade_no',
                'require' => 'no',
                'type' => 'string',
                'description' => '订单号码',
                'restraint' => '最多32个字符',
                'errormsg' => '订单号码错误',
                'max_length' => '32',
                'min_length' => '1',
            ),

        );
    }

}

//end of script


