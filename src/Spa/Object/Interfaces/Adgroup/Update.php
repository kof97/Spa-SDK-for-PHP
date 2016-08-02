<?php 

namespace Spa\Object\Interfaces\Adgroup;



/**
 * Class Update
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Update {

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
exit();
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

            'targeting_id' => array(
                'name' => 'targeting_id',
                'extendType' => 'targeting_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '定向Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'adgroup_name' => array(
                'name' => 'adgroup_name',
                'extendType' => 'adgroup_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '广告组名称',
                'restraint' => '小于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '广告组名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'bid_amount' => array(
                'name' => 'bid_amount',
                'extendType' => 'bid_amount',
                'require' => 'no',
                'type' => 'integer',
                'description' => '广告出价，单位为分',
                'restraint' => '广告出价，单位为分',
                'errormsg' => '广告出价不正确',
            ),

            'begin_date' => array(
                'name' => 'begin_date',
                'extendType' => 'start_date',
                'require' => 'no',
                'type' => 'string',
                'description' => '开始投放时间点对应的时间戳',
                'restraint' => '大于等于0，且小于end_time',
                'errormsg' => '开始投放时间不正确',
                'max_length' => '10',
                'min_length' => '10',
                'pattern' => '{date_pattern}',
            ),

            'end_date' => array(
                'name' => 'end_date',
                'extendType' => 'end_date',
                'require' => 'no',
                'type' => 'string',
                'description' => '结束投放时间点对应的时间戳点对应的时间戳',
                'restraint' => '大于等于今天，且大于begin_time',
                'errormsg' => '结束投放时间点对应的时间戳不正确',
                'max_length' => '10',
                'min_length' => '10',
                'pattern' => '{date_pattern}',
            ),

            'time_series' => array(
                'name' => 'time_series',
                'extendType' => 'time_series',
                'require' => 'no',
                'type' => 'string',
                'description' => '投放时间段，格式为48 * 7位由0和1组成的字符串，也就是以半个小时为最小粒度，0为不投放，1为投放',
                'restraint' => '等于48*7位字符串，且都是0或1，不传此字段则视为全时段投放',
                'errormsg' => '结束投放时间点对应的时间戳不正确',
                'max_length' => '336',
                'min_length' => '336',
            ),

            'creative_selection_type' => array(
                'name' => 'creative_selection_type',
                'extendType' => 'creative_selection_type',
                'require' => 'no',
                'type' => 'string',
                'description' => '素材播放模式',
                'restraint' => '详见 [link href="creative_selection_type"]素材播放模式[/link]',
                'errormsg' => '素材播放模式不正确',
                'enum' => 'enum',
                'source' => 'api_CreativeSelectionType',
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

            'customized_category' => array(
                'name' => 'customized_category',
                'extendType' => 'customized_category',
                'require' => 'no',
                'type' => 'string',
                'description' => '自定义分类，关键词分割，如，本地生活——餐饮',
                'restraint' => '小于等于200个英文字符',
                'errormsg' => '自定义分类不正确',
                'max_length' => '200',
                'min_length' => '0',
            ),

            'min_impression_include' => array(
                'name' => 'min_impression_include',
                'extendType' => 'min_impression_include',
                'require' => 'no',
                'type' => 'integer',
                'description' => '最低曝光频次',
                'restraint' => '大于等于0、小于等于1000',
                'errormsg' => '最低曝光频次不正确',
                'max' => '1000',
                'min' => '0',
            ),

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'type' => 'integer',
                'description' => '最高曝光频次',
                'restraint' => '大于等于0、小于等于1000',
                'errormsg' => '最高曝光频次不正确',
                'max' => '1000',
                'min' => '0',
            ),

            'click_tracking_url' => array(
                'name' => 'click_tracking_url',
                'extendType' => 'click_tracking_url',
                'require' => 'no',
                'type' => 'string',
                'description' => '监控链接',
                'restraint' => '小于1024个英文字符',
                'errormsg' => '监控链接错误',
                'max_length' => '1024',
                'min_length' => '0',
                'pattern' => '/.*/',
            ),

            'subordinate_product_refs_id' => array(
                'name' => 'subordinate_product_refs_id',
                'extendType' => 'subordinate_product_refs_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '子标的物id（渠道包id）',
                'restraint' => '小于128个英文字符，从开放平台api获取',
                'errormsg' => '子标的物id错误',
                'max_length' => '128',
                'min_length' => '0',
            ),

            'dynamic_creative_recommend_type' => array(
                'name' => 'dynamic_creative_recommend_type',
                'extendType' => 'dynamic_creative_recommend_type',
                'require' => 'no',
                'type' => 'integer',
                'description' => '产品推荐方式',
                'restraint' => '允许值可通过接口utility/get_dynamic_right_info获取',
                'errormsg' => '产品推荐方式错误',
                'max' => '9223372036854775807',
                'min' => '0',
            ),

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'campaign.total_budget',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
