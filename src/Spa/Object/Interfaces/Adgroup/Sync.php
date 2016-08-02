<?php 

namespace Spa\Object\Interfaces\Adgroup;



/**
 * Class Sync
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Sync {

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

            'outer_adgroup_id' => array(
                'name' => 'outer_adgroup_id',
                'extendType' => 'outer_adgroup_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
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

            'targeting_id' => array(
                'name' => 'targeting_id',
                'extendType' => 'targeting_id',
                'require' => 'yes',
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
                'require' => 'yes',
                'type' => 'string',
                'description' => '广告组名称',
                'restraint' => '小于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '广告组名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'sync_configured_status',
                'require' => 'yes',
                'type' => 'string',
                'description' => '资源状态',
                'restraint' => '可选值：AD_STATUS_NORMAL, AD_STATUS_SUSPEND, AD_STATUS_DELETED',
                'errormsg' => '资源状态不正确',
                'enum' => 'enum',
                'source' => 'api_sync_configured_status',
            ),

            'bid_type' => array(
                'name' => 'bid_type',
                'extendType' => 'bid_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '扣费方式，如CPD、CPM',
                'restraint' => '详见 [link href="bid_type"]扣费方式[/link]',
                'errormsg' => '扣费方式不正确',
                'enum' => 'enum',
                'source' => 'api_cost_type',
            ),

            'bid_amount' => array(
                'name' => 'bid_amount',
                'extendType' => 'bid_amount',
                'require' => 'yes',
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

            'site_set' => array(
                'name' => 'site_set',
                'extendType' => 'site_set',
                'require' => 'no',
                'type' => 'array',
                'description' => '投放站点集合',
                'restraint' => '当前仅支持单站点，取值详见 [link href="site_set_definition"]投放站点集合[/link]',
                'errormsg' => '投放站点集合不正确',
                'list' => 'SITE_SET_QZONE,SITE_SET_PENGYOU,SITE_SET_QQCLIENT,SITE_SET_TUAN,SITE_SET_MEISHI,SITE_SET_PIAO,SITE_SET_MUSIC,SITE_SET_MOBILE_UNION,SITE_SET_QQCOM,SITE_SET_MAIL,SITE_SET_WECHAT,SITE_SET_YINGYONGBAO_MOBILE,SITE_SET_PC_UNION,SITE_SET_YINGYONGBAO_PC,SITE_SET_MOBILE_INNER',
                    

                'repeated' => array(
                    'type' => 'string',
                    'enum' => 'enum',
                    'source' => 'api_site_set_definition',
                )
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

            'destination_url' => array(
                'name' => 'destination_url',
                'extendType' => 'creative.destination_url',
                'require' => 'yes',
                'type' => '',
            ),

            'product_type' => array(
                'name' => 'product_type',
                'extendType' => 'product_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '标的物类型',
                'restraint' => '详见 [link href="product_type"]标的物类型[/link]',
                'errormsg' => '标的物类型不正确',
                'list' => 'PRODUCT_TYPE_LINK,PRODUCT_TYPE_APP_IOS,PRODUCT_TYPE_APP_ANDROID_OPEN_PLATFORM,PRODUCT_TYPE_QZONE_PAGE_INDEX,PRODUCT_TYPE_QZONE_PAGE_ARTICLE,PRODUCT_TYPE_QZONE_PAGE_IFRAMED,PRODUCT_TYPE_LINK_WECHAT,PRODUCT_TYPE_LINK_MOBILE_QQ_MP',
                'enum' => 'enum',
                'source' => 'api_product_type',
            ),

            'product_refs_id' => array(
                'name' => 'product_refs_id',
                'extendType' => 'product_refs_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '标的物Id',
                'restraint' => '小于128个英文字符',
                'errormsg' => '标的物Id不正确',
                'max_length' => '128',
                'min_length' => '0',
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

            'creative_combination_type' => array(
                'name' => 'creative_combination_type',
                'extendType' => 'creative_combination_type',
                'require' => 'no',
                'type' => 'string',
                'description' => '广告类型，支持普通广告、集装箱广告和动态创意广告',
                'restraint' => '详见 [link href="creative_combination_type"]广告类型[/link]',
                'errormsg' => '广告类型不正确',
                'enum' => 'enum',
                'source' => 'api_ad_group_creative_combination_type',
            ),

            'outer_version' => array(
                'name' => 'outer_version',
                'extendType' => 'outer_version',
                'require' => 'no',
                'type' => 'integer',
                'description' => '调用方数据版本',
                'restraint' => '大于等于0，小于等于2^63',
                'errormsg' => '调用方数据版本不正确',
            ),

        );
    }

}

//end of script
