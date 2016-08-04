<?php 

namespace Spa\Object\Interfaces\TargetingLocation;

use Spa\Object\Detector\FieldsDetector;

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
    public function send($params = array(), $headers = array(), $access_token = null) {

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
                        'type' => 'struct',
                        'description' => '经纬度+半径',
                        'element' => array(
                            'longitude' => array(
                                'name' => 'longitude',
                                'extendType' => 'longitude',
                                'require' => 'yes',
                                'type' => 'float',
                                'description' => '经度，单位度',
                                'restraint' => '小于等于180，大于等于-180，至多6位小数',
                                'errormsg' => '经度错误',
                                'max' => '180',
                                'min' => '-180',
                                'decimalLength' => '6',
                            ),
        
                            'latitude' => array(
                                'name' => 'latitude',
                                'extendType' => 'latitude',
                                'require' => 'yes',
                                'type' => 'float',
                                'description' => '纬度，单位度',
                                'restraint' => '小于等于90，大于等于-90，至多6位小数',
                                'errormsg' => '纬度错误',
                                'max' => '90',
                                'min' => '-90',
                                'decimalLength' => '6',
                            ),
        
                            'radius' => array(
                                'name' => 'radius',
                                'extendType' => 'radius',
                                'require' => 'yes',
                                'type' => 'integer',
                                'description' => '半径，单位米',
                                'restraint' => '大于等于1000，小于等于5000',
                                'errormsg' => '半径错误',
                                'max' => '5000',
                                'min' => '1000',
                            ),
        
                        ),
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
