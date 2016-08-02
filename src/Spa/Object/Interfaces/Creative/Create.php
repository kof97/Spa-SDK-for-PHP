<?php 

namespace Spa\Object\Interfaces\Creative;



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

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

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

            'campaign_id' => array(
                'name' => 'campaign_id',
                'extendType' => 'campaign_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '推广计划Id',
                'restraint' => '小于2^63',
                'errormsg' => '推广计划Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'adgroup_id' => array(
                'name' => 'adgroup_id',
                'extendType' => 'adgroup_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '广告组Id',
                'errormsg' => '广告组Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'creative_name' => array(
                'name' => 'creative_name',
                'extendType' => 'creative_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '素材名称',
                'restraint' => '小于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '素材名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'creative_template_id' => array(
                'name' => 'creative_template_id',
                'extendType' => 'creative_template_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '素材规格Id',
                'restraint' => '详见 [link href="creative_template_id"]素材规格Id[/link]',
                'errormsg' => '素材规格Id不正确',
            ),

            'creative_elements' => array(
                'name' => 'creative_elements',
                'extendType' => 'creative_elements',
                'require' => 'yes',
                'type' => 'string',
                'description' => '素材元素',
                'restraint' => '不超过4096个字符',
                'errormsg' => '素材元素不正确',
                'max_length' => '4096',
                'min_length' => '1',
                'pattern' => '/.*/',
            ),

            'destination_url' => array(
                'name' => 'destination_url',
                'extendType' => 'destination_url',
                'require' => 'yes',
                'type' => 'string',
                'description' => '素材目标url',
                'restraint' => '小于1023个英文字符',
                'errormsg' => '素材目标url不正确',
                'max_length' => '1023',
                'min_length' => '1',
                'pattern' => '{url_pattern}',
            ),

            'impression_tracking_url' => array(
                'name' => 'impression_tracking_url',
                'extendType' => 'impression_tracking_url',
                'require' => 'no',
                'type' => 'string',
                'description' => '曝光监控地址',
                'restraint' => '小于1023个英文字符',
                'errormsg' => '曝光监控地址不正确',
                'max_length' => '1023',
                'min_length' => '0',
                'pattern' => '{url_pattern}',
            ),

            'dynamic_creative_template_id' => array(
                'name' => 'dynamic_creative_template_id',
                'extendType' => 'dynamic_creative_template_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '动态创意模板ID（仅动态创意特性允许使用）',
                'restraint' => '小于2^63',
                'errormsg' => '动态创意模板ID不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'dynamic_creative_material_label' => array(
                'name' => 'dynamic_creative_material_label',
                'extendType' => 'dynamic_creative_material_label',
                'require' => 'no',
                'type' => 'string',
                'description' => '动态创意模板物料标签（仅动态创意特性允许使用）',
                'restraint' => '小于120个英文字符',
                'errormsg' => '动态创意模板物料标签不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'outer_creative_id' => array(
                'name' => 'outer_creative_id',
                'extendType' => 'outer_creative_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告素材Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告素材Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'configured_status',
                'require' => 'no',
                'type' => 'string',
                'description' => '用户状态',
                'errormsg' => '用户状态不正确',
                'enum' => 'enum',
                'source' => 'api_configured_status',
            ),

        );
    }

}

//end of script
