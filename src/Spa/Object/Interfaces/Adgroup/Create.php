<?php 

namespace Spa\Object\Interfaces\Adgroup;



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
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'campaign_id' => array(
                'name' => 'campaign_id',
                'extendType' => 'campaign_id',
                'require' => 'yes',
                'description' => '推广计划Id',
                'restraint' => '小于2^63',
                'errormsg' => '推广计划Id不正确',
                'name' => 'campaign_id',
                'name' => 'campaign_id',
            );

            'targeting_id' => array(
                'name' => 'targeting_id',
                'extendType' => 'targeting_id',
                'require' => 'yes',
                'description' => '定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '定向Id不正确',
                'name' => 'targeting_id',
                'name' => 'targeting_id',
            );

            'adgroup_name' => array(
                'name' => 'adgroup_name',
                'extendType' => 'adgroup_name',
                'require' => 'yes',
                'description' => '广告组名称',
                'restraint' => '小于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '广告组名称不正确',
                'name' => 'adgroup_name',
                'name' => 'adgroup_name',
            );

            'bid_type' => array(
                'name' => 'bid_type',
                'extendType' => 'bid_type',
                'require' => 'yes',
                'description' => '扣费方式，如CPD、CPM',
                'restraint' => '详见 [link href='bid_type']扣费方式[/link]',
                'errormsg' => '扣费方式不正确',
                'name' => 'bid_type',
                'name' => 'bid_type',
            );

            'bid_amount' => array(
                'name' => 'bid_amount',
                'extendType' => 'bid_amount',
                'require' => 'yes',
                'description' => '广告出价，单位为分',
                'restraint' => '广告出价，单位为分',
                'errormsg' => '广告出价不正确',
                'name' => 'bid_amount',
                'name' => 'bid_amount',
            );

            'begin_date' => array(
                'name' => 'begin_date',
                'extendType' => 'start_date',
                'require' => 'yes',
                'description' => '开始投放时间点对应的时间戳',
                'restraint' => '大于等于0，且小于end_time',
                'errormsg' => '开始投放时间不正确',
                'name' => 'begin_date',
                'name' => 'begin_date',
            );

            'end_date' => array(
                'name' => 'end_date',
                'extendType' => 'end_date',
                'require' => 'yes',
                'description' => '结束投放时间点对应的时间戳点对应的时间戳',
                'restraint' => '大于等于今天，且大于begin_time',
                'errormsg' => '结束投放时间点对应的时间戳不正确',
                'name' => 'end_date',
                'name' => 'end_date',
            );

            'site_set' => array(
                'name' => 'site_set',
                'extendType' => 'site_set',
                'require' => 'yes',
                'description' => '投放站点集合',
                'restraint' => '当前仅支持单站点，取值详见 [link href='site_set_definition']投放站点集合[/link]',
                'errormsg' => '投放站点集合不正确',
                'name' => 'site_set',
                'name' => 'site_set',
            );

            'outer_adgroup_id' => array(
                'name' => 'outer_adgroup_id',
                'extendType' => 'outer_adgroup_id',
                'require' => 'no',
                'description' => '外部广告Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告Id不正确',
                'name' => 'outer_adgroup_id',
                'name' => 'outer_adgroup_id',
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

            'product_type' => array(
                'name' => 'product_type',
                'extendType' => 'product_type',
                'require' => 'yes',
                'description' => '标的物类型',
                'restraint' => '详见 [link href='product_type']标的物类型[/link]',
                'errormsg' => '标的物类型不正确',
                'name' => 'product_type',
                'name' => 'product_type',
            );

            'product_refs_id' => array(
                'name' => 'product_refs_id',
                'extendType' => 'product_refs_id',
                'require' => 'no',
                'description' => '标的物Id',
                'restraint' => '小于128个英文字符',
                'errormsg' => '标的物Id不正确',
                'name' => 'product_refs_id',
                'name' => 'product_refs_id',
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

            'creative_combination_type' => array(
                'name' => 'creative_combination_type',
                'extendType' => 'creative_combination_type',
                'require' => 'no',
                'description' => '广告类型，支持普通广告、集装箱广告和动态创意广告',
                'restraint' => '详见 [link href='creative_combination_type']广告类型[/link]',
                'errormsg' => '广告类型不正确',
                'name' => 'creative_combination_type',
                'name' => 'creative_combination_type',
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
