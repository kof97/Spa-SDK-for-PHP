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
        if (isset($data['max_length'])) {
            if ($len > ($max_length = $data['max_length'])) {
                throw new ParamsException("The length of field '$key' is too long, it expects the length can't more than '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("The length of field '$key' is too short, it expects the length at least '$min_length'");
            }
        }

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("The value of field '$key' is limited in '$list'");
            }
        }

        if (isset($data['pattern'])) {
            $pattern = $data['pattern'];
            
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
                'extendType' => 'outer_advertiser_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告主Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告主Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'amount' => array(
                'name' => 'amount',
                'extendType' => 'amount',
                'require' => 'yes',
                'type' => '',
            ),

            'external_bill_no' => array(
                'name' => 'external_bill_no',
                'extendType' => 'external_bill_no',
                'require' => 'no',
                'type' => '',
            ),

            'memo' => array(
                'name' => 'memo',
                'extendType' => 'memo',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
