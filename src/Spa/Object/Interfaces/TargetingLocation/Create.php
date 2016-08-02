<?php 

namespace Spa\Object\Interfaces\TargetingLocation;

use Spa\Exceptions\ParamsException;

/**
 * Class Create
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Create {

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

            'location_type' => array(
                'name' => 'location_type',
                'extendType' => 'location_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '商圈类型',
                'restraint' => '商圈类型',
                'enum' => 'enum',
                'source' => 'api_location_type',
            ),

            'location_name' => array(
                'name' => 'location_name',
                'extendType' => 'location_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '自定义打点名称',
                'restraint' => '小于等于60个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '自定义打点名称错误',
                'max_length' => '60',
                'min_length' => '1',
            ),

            'location_spec' => array(
                'name' => 'location_spec',
                'extendType' => 'location_spec',
                'require' => 'yes',
                'type' => 'struct',
                'description' => '商圈具体配置信息',
                'restraint' => '商圈具体配置信息',
                'element' => array(
                    'location_type_circle' => array(
                        'name' => 'location_type_circle',
                        'extendType' => 'location_type_circle',
                        'require' => 'yes',
                    ),
                ),
            ),

            'city_id' => array(
                'name' => 'city_id',
                'extendType' => 'integer',
                'require' => 'yes',
                'type' => 'number',
                'description' => '整数',
                'restraint' => '大于0小于2^63',
                'errormsg' => '非有效整数',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

        );
    }

}

//end of script
