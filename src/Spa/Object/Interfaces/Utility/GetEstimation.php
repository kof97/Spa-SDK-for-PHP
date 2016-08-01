<?php 

namespace Spa\Object\Interfaces\Utility;



/**
 * Class GetEstimation
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetEstimation {

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
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'targeting.read_targeting_setting',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'targeting_setting',
                'name' => 'targeting_setting',
            );

            'adgroup_setting' => array(
                'name' => 'adgroup_setting',
                'extendType' => 'adgroup_setting',
                'require' => 'no',
                'description' => '广告组信息所组成的对象',
                'restraint' => '小于1024英文字符，支持字段time_series, site_set, bid_type, bid, product_refs_id, product_type，示例：{"bid_type":"COSTTYPE_CPC", "product_type": "PRODUCT_TYPE_LINK"}',
                'errormsg' => '广告组信息不正确',
                'name' => 'adgroup_setting',
                'name' => 'adgroup_setting',
            );

            'creative_setting' => array(
                'name' => 'creative_setting',
                'extendType' => 'creative_setting',
                'require' => 'no',
                'description' => '素材信息所组成的对象',
                'restraint' => '小于1024英文字符，支持字段creative_template_id，[{"creative_template_id":1},{"creative_template_id":2}]',
                'errormsg' => '素材信息不正确',
                'name' => 'creative_setting',
                'name' => 'creative_setting',
            );
;
    }

}

//end of script
