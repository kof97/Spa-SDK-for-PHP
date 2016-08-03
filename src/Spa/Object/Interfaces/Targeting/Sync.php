<?php 

namespace Spa\Object\Interfaces\Targeting;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Sync
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Sync
{
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
    public function __construct($spa, $mod, $act)
    {

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
    public function send($params = array(), $headers = array())
    {

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    /**
     * The fields info.
     */
    public function fieldInfo()
    {
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

            'targeting_name' => array(
                'name' => 'targeting_name',
                'extendType' => 'targeting_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '定向名称',
                'restraint' => '小于等于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '定向名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'ui_visibility' => array(
                'name' => 'ui_visibility',
                'extendType' => 'ui_visibility',
                'require' => 'no',
                'type' => 'string',
                'description' => '定向包类型',
                'restraint' => '详见 [link href="ui_visibility"]定向包类型[/link]',
                'errormsg' => '定向包类型不正确',
                'enum' => 'enum',
                'source' => 'api_u_i_visibility',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => 'string',
                'description' => '定向描述',
                'restraint' => '小于250个英文字符',
                'errormsg' => '定向描述不正确',
                'max_length' => '250',
                'min_length' => '0',
            ),

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'write_targeting_setting',
                'require' => 'no',
                'type' => 'struct',
                'description' => '定向详细设置',
                'restraint' => '存放所有定向条件',
                'errormsg' => '定向详细设置不正确',
                'element' => array(
                    'age' => array(
                        'name' => 'age',
                        'extendType' => 'age',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '年龄定向',
                        'restraint' => '（仅支持单年龄段，且5~60） 详见 [link href="age"]年龄[/link]',
                        'errormsg' => '年龄定向不正确',
                        'pattern' => '{age_pattern}',
                        'item_max_length' => '255',
                    ),

                    'gender' => array(
                        'name' => 'gender',
                        'extendType' => 'gender',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '性别定向（仅单选）',
                        'restraint' => '详见 [link href="gender"]性别[/link]',
                        'errormsg' => '性别定向不正确',
                        'item_max_length' => '255',
                    ),

                    'location' => array(
                        'name' => 'location',
                        'extendType' => 'location',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '商圈定向',
                        'restraint' => '详见 [link href="location"]商圈[/link]',
                        'errormsg' => '商圈定向不正确',
                    ),

                    'user_os' => array(
                        'name' => 'user_os',
                        'extendType' => 'user_os',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '操作系统定向',
                        'restraint' => '详见 [link href="user_os"]操作系统[/link]',
                        'errormsg' => '操作系统定向不正确',
                        'item_max_length' => '255',
                    ),

                    'network_type' => array(
                        'name' => 'network_type',
                        'extendType' => 'network_type',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '联网方式定向',
                        'restraint' => '详见 [link href="network_type"]联网方式定向[/link]',
                        'errormsg' => '联网方式定向不正确',
                        'item_max_length' => '255',
                    ),

                    'network_operator' => array(
                        'name' => 'network_operator',
                        'extendType' => 'network_operator',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '移动运营商定向',
                        'restraint' => '详见 [link href="network_operator"]移动运营商[/link]',
                        'errormsg' => '移动运营商定向不正确',
                        'item_max_length' => '255',
                    ),

                    'region' => array(
                        'name' => 'region',
                        'extendType' => 'region',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '地理位置定向',
                        'restraint' => '存放地理位置定向条件',
                        'errormsg' => '地理位置定向设置不正确',
                        'element' => array(
                            'region_type' => array(
                                'name' => 'region_type',
                                'extendType' => 'region_type',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '地域定向类型，包含实时、常驻和旅行',
                                'restraint' => '详见 [link href="region_type"]地域定向类型[/link]',
                                'errormsg' => '地域定向类型不正确',
                                'enum' => 'enum',
                                'source' => 'api_region_type',
                            ),
        
                            'region_value' => array(
                                'name' => 'region_value',
                                'extendType' => 'region_value',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => '区域编码',
                                'restraint' => '详见 [link href="area"]地区[/link]',
                                'errormsg' => '区域定向不正确',
                            ),
        
                        ),
                    ),

                    'business_interest' => array(
                        'name' => 'business_interest',
                        'extendType' => 'business_interest',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '商业兴趣定向',
                        'restraint' => '详见 [link href="business_interest"]商业兴趣[/link]',
                        'errormsg' => '商业兴趣定向不正确',
                    ),

                    'online_scenario' => array(
                        'name' => 'online_scenario',
                        'extendType' => 'online_scenario',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '上网场景',
                        'restraint' => '详见 [link href="online_scenario"]上网场景[/link]',
                        'errormsg' => '上网场景不正确',
                        'item_max_length' => '255',
                    ),

                    'education' => array(
                        'name' => 'education',
                        'extendType' => 'education',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '用户学历',
                        'restraint' => '详见  [link href="education"]用户学历[/link]',
                        'errormsg' => '用户学历不正确',
                        'item_max_length' => '255',
                    ),

                    'paying_user_type' => array(
                        'name' => 'paying_user_type',
                        'extendType' => 'paying_user_type',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '付费用户',
                        'restraint' => '详见  [link href="paying_user_type"]付费用户[/link]',
                        'errormsg' => '付费用户不正确',
                        'item_max_length' => '255',
                    ),

                    'dressing_index' => array(
                        'name' => 'dressing_index',
                        'extendType' => 'dressing_index',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '穿衣指数',
                        'restraint' => '详见  [link href="dressing_index"]穿衣指数[/link]',
                        'errormsg' => '穿衣指数不正确',
                        'item_max_length' => '255',
                    ),

                    'uv_index' => array(
                        'name' => 'uv_index',
                        'extendType' => 'uv_index',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '紫外线指数',
                        'restraint' => '详见  [link href="uv_index"]紫外线指数[/link]',
                        'errormsg' => '紫外线指数不正确',
                        'item_max_length' => '255',
                    ),

                    'makeup_index' => array(
                        'name' => 'makeup_index',
                        'extendType' => 'makeup_index',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '化妆指数',
                        'restraint' => '详见  [link href="makeup_index"]化妆指数[/link]',
                        'errormsg' => '化妆指数不正确',
                        'item_max_length' => '255',
                    ),

                    'climate' => array(
                        'name' => 'climate',
                        'extendType' => 'climate',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '气象',
                        'restraint' => '详见  [link href="climate"]气象[/link]',
                        'errormsg' => '气象不正确',
                        'item_max_length' => '255',
                    ),

                    'temperature' => array(
                        'name' => 'temperature',
                        'extendType' => 'temperature',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '温度（仅单温度段，且223~323）',
                        'restraint' => '详见  [link href="temperature"]温度[/link]',
                        'errormsg' => '温度不正确',
                        'pattern' => '{age_pattern}',
                        'item_max_length' => '255',
                    ),

                    'app_install_status' => array(
                        'name' => 'app_install_status',
                        'extendType' => 'app_install_status',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '应用用户',
                        'restraint' => '详见  [link href="app_install_status"]应用用户[/link]',
                        'errormsg' => '应用用户不正确',
                        'item_max_length' => '255',
                    ),

                    'device_price' => array(
                        'name' => 'device_price',
                        'extendType' => 'device_price',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '设备价格',
                        'restraint' => '详见 [link href="device_price"]设备价格[/link]',
                        'errormsg' => '设备价格不正确',
                        'pattern' => '{age_pattern}',
                        'item_max_length' => '255',
                    ),

                    'customized_shopping_behavior' => array(
                        'name' => 'customized_shopping_behavior',
                        'extendType' => 'customized_shopping_behavior',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '定制购物行为',
                        'restraint' => '详见 [link href="customized_shopping_behavior"]定制购物行为[/link]，仅限已提供购物行为数据给广点通的广告主使用。',
                        'errormsg' => '定制购物行为不正确',
                        'element' => array(
                            'object_type' => array(
                                'name' => 'object_type',
                                'extendType' => 'object_type',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '行为对象的类型',
                                'restraint' => '类目或店铺',
                                'errormsg' => '行为对象的类型不正确',
                                'enum' => 'enum',
                                'source' => 'api_jd_s_b_object_type',
                            ),
        
                            'object_id_list' => array(
                                'name' => 'object_id_list',
                                'extendType' => 'object_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => '行为对象的id',
                                'restraint' => '类目或店铺id',
                                'errormsg' => '行为对象的id不正确',
                                'item_max_length' => '255',
                            ),
        
                            'time_window' => array(
                                'name' => 'time_window',
                                'extendType' => 'time_window',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '行为对象有效期',
                                'restraint' => '分为短期、中期和长期 ',
                                'errormsg' => '行为对象有效期不正确',
                                'enum' => 'enum',
                                'source' => 'api_jd_s_b_time_window',
                            ),
        
                            'act_id_list' => array(
                                'name' => 'act_id_list',
                                'extendType' => 'act_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => 'app行为对象的行为',
                                'errormsg' => '行为对象的行为不正确',
                            ),
        
                        ),
                    ),

                    'media_category_wechat' => array(
                        'name' => 'media_category_wechat',
                        'extendType' => 'media_category_wechat',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '微信流量分类定向',
                        'restraint' => '详见 [link href="media_category_wechat"]微信流量分类[/link]，仅限京东、微信使用',
                        'errormsg' => '微信流量分类定向不正确',
                    ),

                    'app_behavior' => array(
                        'name' => 'app_behavior',
                        'extendType' => 'app_behavior',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => 'app行为定向',
                        'restraint' => '详见 [link href="app_behavior"]行为定向[/link]',
                        'errormsg' => 'app行为定向错误',
                        'element' => array(
                            'object_type' => array(
                                'name' => 'object_type',
                                'extendType' => 'app_behavior_object_type',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '行为对象的类型',
                                'restraint' => '可选值为：1、APP类目（APP_CLASS） 2、具体APP（APP_ID）',
                                'errormsg' => 'app购物行为的类型错误',
                                'enum' => 'enum',
                                'source' => 'api_app_action_object_type',
                            ),
        
                            'object_id_list' => array(
                                'name' => 'object_id_list',
                                'extendType' => 'app_behavior_object_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => '行为对象的id',
                                'restraint' => '类目或app id，一次至多可选10个',
                                'errormsg' => 'app行为对象的id不正确',
                                'item_max_length' => '255',
                            ),
        
                            'time_window' => array(
                                'name' => 'time_window',
                                'extendType' => 'app_behavior_time_window',
                                'require' => 'no',
                                'type' => 'integer',
                                'description' => '行为对象的有效期',
                                'restraint' => '单位天，有效值区间：1~365',
                                'errormsg' => 'app购物行为的类型错误',
                                'max' => '365',
                                'min' => '1',
                            ),
        
                            'act_id_list' => array(
                                'name' => 'act_id_list',
                                'extendType' => 'app_behavior_act_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => 'app行为对象的行为',
                                'errormsg' => '行为对象的行为不正确',
                                'item_max_length' => '255',
                            ),
        
                        ),
                    ),

                    'ad_placement_id' => array(
                        'name' => 'ad_placement_id',
                        'extendType' => 'ad_placement_id',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '广告位(id)定向',
                        'restraint' => '小于4200000000',
                        'errormsg' => '广告位(id)定向错误',
                    ),

                    'relationship_status' => array(
                        'name' => 'relationship_status',
                        'extendType' => 'relationship_status',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '婚恋状态',
                        'restraint' => '详见 [link href="relationship_status"]婚恋状态[/link]',
                        'errormsg' => '婚恋状态不正确',
                        'item_max_length' => '255',
                    ),

                    'shopping_capability' => array(
                        'name' => 'shopping_capability',
                        'extendType' => 'shopping_capability',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '消费能力',
                        'restraint' => '详见 [link href="shopping_capability"]消费能力[/link]',
                        'errormsg' => '婚恋状态不正确',
                        'item_max_length' => '255',
                    ),

                    'customized_audience' => array(
                        'name' => 'customized_audience',
                        'extendType' => 'customized_audience',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '自定义人群',
                        'restraint' => '传入targeting_rule/create_custom_audience创建成功返回的规则id,至多使用10个',
                        'errormsg' => '自定义人群不正确',
                        'item_max_length' => '255',
                    ),

                    'mobile_qq_media_follower' => array(
                        'name' => 'mobile_qq_media_follower',
                        'extendType' => 'mobile_qq_media_follower',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '手Q粉丝定向',
                        'restraint' => '正数为该公众账号的粉丝，负数为非该公众账号的粉丝',
                        'errormsg' => '手Q粉丝定向不正确',
                    ),

                    'keyword' => array(
                        'name' => 'keyword',
                        'extendType' => 'keyword',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '关键词定向',
                        'restraint' => '详见 [link href="keyword"]关键词定向[/link]',
                        'errormsg' => '关键词定向不正确',
                        'element' => array(
                            'words' => array(
                                'name' => 'words',
                                'extendType' => 'words',
                                'require' => 'yes',
                                'type' => 'array',
                                'description' => '关键词',
                                'restraint' => '小于或等于30个字节',
                                'errormsg' => '关键词不正确',
                                'item_max_length' => '30',
                            ),
        
                        ),
                    ),

                    'media_category_union' => array(
                        'name' => 'media_category_union',
                        'extendType' => 'media_category_union',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '移动媒体定向',
                        'restraint' => '详见 [link href="media_category_union"]移动媒体定向[/link]',
                        'errormsg' => '移动媒体定向错误',
                    ),

                    'living_status' => array(
                        'name' => 'living_status',
                        'extendType' => 'living_status',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '生活状态',
                        'restraint' => '详见 [link href="living_status"]生活状态[/link]',
                        'errormsg' => '生活状态不正确',
                        'item_max_length' => '255',
                    ),

                    'residential_community_price' => array(
                        'name' => 'residential_community_price',
                        'extendType' => 'residential_community_price',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '居民社区价格，单位是“元/m²”',
                        'restraint' => '详见  [link href="residential_community_price"]社区价格[/link]',
                        'errormsg' => '居民社区价格不正确',
                        'pattern' => '/^\d{1,6}\~\d{1,6}$/',
                        'item_max_length' => '255',
                    ),

                    'birthday_ahead_days' => array(
                        'name' => 'birthday_ahead_days',
                        'extendType' => 'birthday_ahead_days',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '生日定向',
                        'restraint' => '取值范围0-10，0表示生日当天，其他数字表示在生日提前n天进行投放',
                        'errormsg' => '生日定向错误',
                        'pattern' => '/0~(\d)+/',
                        'item_max_length' => '10',
                    ),

                    'shopping_behavior_jd' => array(
                        'name' => 'shopping_behavior_jd',
                        'extendType' => 'shopping_behavior_jd',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '京东购物行为',
                        'restraint' => '详见 [link href="shopping_behavior_jd"]京东、拍拍购物行为[/link]',
                        'errormsg' => '京东购物行为不正确',
                        'element' => array(
                            'object_type' => array(
                                'name' => 'object_type',
                                'extendType' => 'object_type',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '行为对象的类型',
                                'restraint' => '类目或店铺',
                                'errormsg' => '行为对象的类型不正确',
                                'enum' => 'enum',
                                'source' => 'api_jd_s_b_object_type',
                            ),
        
                            'object_id_list' => array(
                                'name' => 'object_id_list',
                                'extendType' => 'object_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => '行为对象的id',
                                'restraint' => '类目或店铺id',
                                'errormsg' => '行为对象的id不正确',
                                'item_max_length' => '255',
                            ),
        
                            'time_window' => array(
                                'name' => 'time_window',
                                'extendType' => 'time_window',
                                'require' => 'no',
                                'type' => 'string',
                                'description' => '行为对象有效期',
                                'restraint' => '分为短期、中期和长期 ',
                                'errormsg' => '行为对象有效期不正确',
                                'enum' => 'enum',
                                'source' => 'api_jd_s_b_time_window',
                            ),
        
                            'act_id_list' => array(
                                'name' => 'act_id_list',
                                'extendType' => 'act_id_list',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => 'app行为对象的行为',
                                'errormsg' => '行为对象的行为不正确',
                            ),
        
                            'data_source' => array(
                                'name' => 'data_source',
                                'extendType' => 'data_source',
                                'require' => 'no',
                                'type' => 'array',
                                'description' => '购物行为的数据源',
                                'restraint' => 'PC、手Q、微信或APP数据源',
                                'errormsg' => '购物行为的数据源不正确',
                            ),
        
                        ),
                    ),

                    'category_58' => array(
                        'name' => 'category_58',
                        'extendType' => 'category_58',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '58类目定向',
                        'restraint' => '详见 [link href="wuba_category"]58类目定向[/link]，仅限58同城使用',
                        'errormsg' => '58类目定向不正确',
                    ),

                    'qq_wallet_user' => array(
                        'name' => 'qq_wallet_user',
                        'extendType' => 'qq_wallet_user',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => 'QQ钱包用户标签',
                        'restraint' => '详见 [link href="api_qq_wallet_user"]QQ钱包用户标签[/link]',
                        'errormsg' => 'QQ钱包用户标签定向不正确',
                        'item_max_length' => '255',
                    ),

                    'qq_wallet_shop' => array(
                        'name' => 'qq_wallet_shop',
                        'extendType' => 'qq_wallet_shop',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => 'QQ钱包商铺标签',
                        'restraint' => '详见 [link href="api_qq_wallet_shop"]QQ钱包商铺标签[/link]',
                        'errormsg' => 'QQ钱包商铺标签定向不正确',
                        'item_max_length' => '255',
                    ),

                    'media_category_mobile_qq' => array(
                        'name' => 'media_category_mobile_qq',
                        'extendType' => 'media_category_mobile_qq',
                        'require' => 'no',
                        'type' => 'array',
                        'description' => '手Q兴趣部落分类定向',
                        'restraint' => '详见 [link href="media_category_mobile_qq"]手Q兴趣部落分类[/link]',
                        'errormsg' => '手Q兴趣部落分类定向不正确',
                    ),

                ),
            ),

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'targeting_status',
                'require' => 'yes',
                'type' => 'string',
                'description' => '定向状态',
                'restraint' => '可选值：AD_STATUS_NORMAL, AD_STATUS_DELETED',
                'errormsg' => '定向状态不正确',
                'list' => 'AD_STATUS_NORMAL,AD_STATUS_DELETED',
                'enum' => 'enum',
                'source' => 'api_sync_configured_status',
            ),

            'outer_targeting_id' => array(
                'name' => 'outer_targeting_id',
                'extendType' => 'outer_targeting_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告定向Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
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
