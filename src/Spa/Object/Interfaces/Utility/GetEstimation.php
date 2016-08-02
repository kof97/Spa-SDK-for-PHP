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

        $this->validateField($params);

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }


        $data = $this->fieldInfo();

        foreach ($params as $key => $value) {
            

            $type = $data[$key]['type'];
            switch ($type) {
                case 'string':
                    
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

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'targeting.read_targeting_setting',
                'require' => 'no',
                'type' => '',
            ),

            'adgroup_setting' => array(
                'name' => 'adgroup_setting',
                'extendType' => 'adgroup_setting',
                'require' => 'no',
                'type' => 'struct',
                'description' => '广告组信息所组成的对象',
                'restraint' => '小于1024英文字符，支持字段time_series, site_set, bid_type, bid, product_refs_id, product_type，示例：{"bid_type":"COSTTYPE_CPC", "product_type": "PRODUCT_TYPE_LINK"}',
                'errormsg' => '广告组信息不正确',
                'element' => array(
                    'bid_type' => array(
                        'name' => 'bid_type',
                        'extendType' => 'adgroup.bid_type',
                        'require' => 'no',
                    ),
                    'bid_amount' => array(
                        'name' => 'bid_amount',
                        'extendType' => 'adgroup.bid_amount',
                        'require' => 'no',
                    ),
                    'site_set' => array(
                        'name' => 'site_set',
                        'extendType' => 'site_set',
                        'require' => 'no',
                    ),
                    'time_series' => array(
                        'name' => 'time_series',
                        'extendType' => 'adgroup.time_series',
                        'require' => 'no',
                    ),
                    'product_type' => array(
                        'name' => 'product_type',
                        'extendType' => 'product_type',
                        'require' => 'no',
                    ),
                    'product_refs_id' => array(
                        'name' => 'product_refs_id',
                        'extendType' => 'product_refs_id',
                        'require' => 'no',
                    ),
                ),
            ),

            'creative_setting' => array(
                'name' => 'creative_setting',
                'extendType' => 'creative_setting',
                'require' => 'no',
                'type' => 'array',
                'description' => '素材信息所组成的对象',
                'restraint' => '小于1024英文字符，支持字段creative_template_id，[{"creative_template_id":1},{"creative_template_id":2}]',
                'errormsg' => '素材信息不正确',
                    

                'item_max_length' => '32',
                'repeated' => array(
                    'type' => 'creative_struct',
                    'item_max_length' => '32',
                )
            ),

        );
    }

}

//end of script
