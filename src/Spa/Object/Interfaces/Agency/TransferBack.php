<?php 

namespace Spa\Object\Interfaces\Agency;

use Spa\Exceptions\ParamsException;

/**
 * Class TransferBack
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class TransferBack {

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
                    $this->validateString($data[$key], $value);
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

    protected function validateString($data, $value) {

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

            'account_type' => array(
                'name' => 'account_type',
                'extendType' => 'account_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '账户类型',
                'restraint' => '见 [link href="account_type_map"]账户类型定义[/link]',
                'errormsg' => '账户类型不正确',
                'enum' => 'enum',
                'source' => 'api_account_type_map',
            ),

            'outer_advertiser_id' => array(
                'name' => 'outer_advertiser_id',
                'extendType' => 'advertiser.outer_advertiser_id',
                'require' => 'no',
                'type' => '',
            ),

            'amount' => array(
                'name' => 'amount',
                'extendType' => 'amount',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '金额',
                'restraint' => '单位为分',
                'errormsg' => '金额不正确',
                'max' => '2000000000',
                'min' => '1',
            ),

            'external_bill_no' => array(
                'name' => 'external_bill_no',
                'extendType' => 'external_bill_no',
                'require' => 'no',
                'type' => 'string',
                'description' => '外部订单号',
                'restraint' => '不超过35字符，需要有调用方标示前缀，且要保证在同一个广告主下唯一，如jdzt-xxx-xxx',
                'errormsg' => '外部订单号不正确',
                'max_length' => '35',
                'min_length' => '1',
                'pattern' => '/^[0-9a-z\-_]{10,35}$/',
            ),

            'memo' => array(
                'name' => 'memo',
                'extendType' => 'memo',
                'require' => 'no',
                'type' => 'string',
                'description' => '备注信息',
                'restraint' => '不超过64个英文字符',
                'errormsg' => '备注信息不正确',
                'max_length' => '64',
                'min_length' => '1',
                'pattern' => '{memo_pattern}',
            ),

        );
    }

}

//end of script
