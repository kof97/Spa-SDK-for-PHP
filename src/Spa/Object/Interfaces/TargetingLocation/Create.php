<?php 

namespace Spa\Object\Interfaces\TargetingLocation;



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
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                
                
                
                'name' => 'advertiser_id',
            );

            'location_type' => array(
                'name' => 'location_type',
                'extendType' => 'location_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '商圈类型',
                'restraint' => '商圈类型',
                
                
                
                
                'name' => 'location_type',
            );

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
                
                'name' => 'location_name',
            );

            'location_spec' => array(
                'name' => 'location_spec',
                'extendType' => 'location_spec',
                'require' => 'yes',
                'type' => 'struct',
                'description' => '商圈具体配置信息',
                'restraint' => '商圈具体配置信息',
                
                
                
                
                'name' => 'location_spec',
            );

            'city_id' => array(
                'name' => 'city_id',
                'extendType' => 'integer',
                'require' => 'yes',
                'type' => 'number',
                'description' => '整数',
                'restraint' => '大于0小于2^63',
                'errormsg' => '非有效整数',
                
                
                
                'name' => 'city_id',
            );
;
    }

}

//end of script
