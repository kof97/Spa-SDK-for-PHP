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

            'adgroup_id' => array(
                'name' => 'adgroup_id',
                'extendType' => 'adgroup_id',
                'require' => 'yes',
                'description' => '广告组Id',
                'restraint' => '',
                'errormsg' => '广告组Id不正确',
                'name' => 'adgroup_id',
                'name' => 'adgroup_id',
            );

            'targeting_id' => array(
                'name' => 'targeting_id',
                'extendType' => 'targeting_id',
                'require' => 'no',
                'description' => '定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '定向Id不正确',
                'name' => 'targeting_id',
                'name' => 'targeting_id',
            );

            'adgroup_name' => array(
                'name' => 'adgroup_name',
                'extendType' => 'adgroup_name',
                'require' => 'no',
                'description' => '广告组名称',
                'restraint' => '小于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '广告组名称不正确',
                'name' => 'adgroup_name',
                'name' => 'adgroup_name',
            );

            'bid_amount' => array(
                'name' => 'bid_amount',
                'extendType' => 'bid_amount',
                'require' => 'no',
                'description' => '广告出价，单位为分',
                'restraint' => '广告出价，单位为分',
                'errormsg' => '广告出价不正确',
                'name' => 'bid_amount',
                'name' => 'bid_amount',
            );

            'begin_date' => array(
                'name' => 'begin_date',
                'extendType' => 'start_date',
                'require' => 'no',
                'description' => '开始投放时间点对应的时间戳',
                'restraint' => '大于等于0，且小于end_time',
                'errormsg' => '开始投放时间不正确',
                'name' => 'begin_date',
                'name' => 'begin_date',
            );

            'end_date' => array(
                'name' => 'end_date',
                'extendType' => 'end_date',
                'require' => 'no',
                'description' => '结束投放时间点对应的时间戳点对应的时间戳',
                'restraint' => '大于等于今天，且大于begin_time',
                'errormsg' => '结束投放时间点对应的时间戳不正确',
                'name' => 'end_date',
                'name' => 'end_date',
            );

            'time_series' => array(
                'name' => 'time_series',
                'extendType' => 'time_series',
                'require' => 'no',
                'description' => '投放时间段，格式为48 * 7位由0和1组成的字符串，也就是以半个小时为最小粒度，0为不投放，1为投放',
                'restraint' => '等于48*7位字符串，且都是0或1，不传此字段则视为全时段投放',
                'errormsg' => '结束投放时间点对应的时间戳不正确',
                'name' => 'time_series',
                'name' => 'time_series',
            );

            'creative_selection_type' => array(
                'name' => 'creative_selection_type',
                'extendType' => 'creative_selection_type',
                'require' => 'no',
                'description' => '素材播放模式',
                'restraint' => '详见 [link href='creative_selection_type']素材播放模式[/link]',
                'errormsg' => '素材播放模式不正确',
                'name' => 'creative_selection_type',
                'name' => 'creative_selection_type',
            );

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'configured_status',
                'require' => 'no',
                'description' => '用户状态',
                'restraint' => '',
                'errormsg' => '用户状态不正确',
                'name' => 'configured_status',
                'name' => 'configured_status',
            );

            'customized_category' => array(
                'name' => 'customized_category',
                'extendType' => 'customized_category',
                'require' => 'no',
                'description' => '自定义分类，关键词分割，如，本地生活——餐饮',
                'restraint' => '小于等于200个英文字符',
                'errormsg' => '自定义分类不正确',
                'name' => 'customized_category',
                'name' => 'customized_category',
            );

            'min_impression_include' => array(
                'name' => 'min_impression_include',
                'extendType' => 'min_impression_include',
                'require' => 'no',
                'description' => '最低曝光频次',
                'restraint' => '大于等于0、小于等于1000',
                'errormsg' => '最低曝光频次不正确',
                'name' => 'min_impression_include',
                'name' => 'min_impression_include',
            );

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'description' => '最高曝光频次',
                'restraint' => '大于等于0、小于等于1000',
                'errormsg' => '最高曝光频次不正确',
                'name' => 'max_impression_include',
                'name' => 'max_impression_include',
            );

            'click_tracking_url' => array(
                'name' => 'click_tracking_url',
                'extendType' => 'click_tracking_url',
                'require' => 'no',
                'description' => '监控链接',
                'restraint' => '小于1024个英文字符',
                'errormsg' => '监控链接错误',
                'name' => 'click_tracking_url',
                'name' => 'click_tracking_url',
            );

            'subordinate_product_refs_id' => array(
                'name' => 'subordinate_product_refs_id',
                'extendType' => 'subordinate_product_refs_id',
                'require' => 'no',
                'description' => '子标的物id（渠道包id）',
                'restraint' => '小于128个英文字符，从开放平台api获取',
                'errormsg' => '子标的物id错误',
                'name' => 'subordinate_product_refs_id',
                'name' => 'subordinate_product_refs_id',
            );

            'dynamic_creative_recommend_type' => array(
                'name' => 'dynamic_creative_recommend_type',
                'extendType' => 'dynamic_creative_recommend_type',
                'require' => 'no',
                'description' => '产品推荐方式',
                'restraint' => '允许值可通过接口utility/get_dynamic_right_info获取',
                'errormsg' => '产品推荐方式错误',
                'name' => 'dynamic_creative_recommend_type',
                'name' => 'dynamic_creative_recommend_type',
            );

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'campaign.total_budget',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'total_budget',
                'name' => 'total_budget',
            );
;
    }

}

//end of script
