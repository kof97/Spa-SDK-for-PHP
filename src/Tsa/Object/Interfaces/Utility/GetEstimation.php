<?php 

namespace Spa\Object\Interfaces\Utility;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class GetEstimation
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetEstimation
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
     * Send a request with the user's token.
     *
     * @param array $params       The request params.
     * @param array $headers      The request headers.
     * @param array $access_token The user's access token.
     * @return Response
     */
    public function sendWithAccessToken($params = array(), $headers = array(), $access_token = null)
    {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

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

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'read_targeting_setting',
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
                    ),

                    'gender' => array(
                        'name' => 'gender',
                        'extendType' => 'gender',
                        'require' => 'no',
                    ),

                    'location' => array(
                        'name' => 'location',
                        'extendType' => 'location',
                        'require' => 'no',
                    ),

                    'user_os' => array(
                        'name' => 'user_os',
                        'extendType' => 'user_os',
                        'require' => 'no',
                    ),

                    'network_type' => array(
                        'name' => 'network_type',
                        'extendType' => 'network_type',
                        'require' => 'no',
                    ),

                    'network_operator' => array(
                        'name' => 'network_operator',
                        'extendType' => 'network_operator',
                        'require' => 'no',
                    ),

                    'region' => array(
                        'name' => 'region',
                        'extendType' => 'region',
                        'require' => 'no',
                    ),

                    'business_interest' => array(
                        'name' => 'business_interest',
                        'extendType' => 'business_interest',
                        'require' => 'no',
                    ),

                    'online_scenario' => array(
                        'name' => 'online_scenario',
                        'extendType' => 'online_scenario',
                        'require' => 'no',
                    ),

                    'education' => array(
                        'name' => 'education',
                        'extendType' => 'education',
                        'require' => 'no',
                    ),

                    'paying_user_type' => array(
                        'name' => 'paying_user_type',
                        'extendType' => 'paying_user_type',
                        'require' => 'no',
                    ),

                    'dressing_index' => array(
                        'name' => 'dressing_index',
                        'extendType' => 'dressing_index',
                        'require' => 'no',
                    ),

                    'uv_index' => array(
                        'name' => 'uv_index',
                        'extendType' => 'uv_index',
                        'require' => 'no',
                    ),

                    'makeup_index' => array(
                        'name' => 'makeup_index',
                        'extendType' => 'makeup_index',
                        'require' => 'no',
                    ),

                    'climate' => array(
                        'name' => 'climate',
                        'extendType' => 'climate',
                        'require' => 'no',
                    ),

                    'temperature' => array(
                        'name' => 'temperature',
                        'extendType' => 'temperature',
                        'require' => 'no',
                    ),

                    'app_install_status' => array(
                        'name' => 'app_install_status',
                        'extendType' => 'app_install_status',
                        'require' => 'no',
                    ),

                    'device_price' => array(
                        'name' => 'device_price',
                        'extendType' => 'device_price',
                        'require' => 'no',
                    ),

                    'customized_shopping_behavior' => array(
                        'name' => 'customized_shopping_behavior',
                        'extendType' => 'customized_shopping_behavior',
                        'require' => 'no',
                    ),

                    'media_category_wechat' => array(
                        'name' => 'media_category_wechat',
                        'extendType' => 'media_category_wechat',
                        'require' => 'no',
                    ),

                    'app_behavior' => array(
                        'name' => 'app_behavior',
                        'extendType' => 'app_behavior',
                        'require' => 'no',
                    ),

                    'ad_placement_id' => array(
                        'name' => 'ad_placement_id',
                        'extendType' => 'ad_placement_id',
                        'require' => 'no',
                    ),

                    'relationship_status' => array(
                        'name' => 'relationship_status',
                        'extendType' => 'relationship_status',
                        'require' => 'no',
                    ),

                    'shopping_capability' => array(
                        'name' => 'shopping_capability',
                        'extendType' => 'shopping_capability',
                        'require' => 'no',
                    ),

                    'customized_audience' => array(
                        'name' => 'customized_audience',
                        'extendType' => 'customized_audience',
                        'require' => 'no',
                    ),

                    'mobile_qq_media_follower' => array(
                        'name' => 'mobile_qq_media_follower',
                        'extendType' => 'mobile_qq_media_follower',
                        'require' => 'no',
                    ),

                    'keyword' => array(
                        'name' => 'keyword',
                        'extendType' => 'keyword',
                        'require' => 'no',
                    ),

                    'media_category_union' => array(
                        'name' => 'media_category_union',
                        'extendType' => 'media_category_union',
                        'require' => 'no',
                    ),

                    'living_status' => array(
                        'name' => 'living_status',
                        'extendType' => 'living_status',
                        'require' => 'no',
                    ),

                    'qzone_fans' => array(
                        'name' => 'qzone_fans',
                        'extendType' => 'qzone_fans',
                        'require' => 'no',
                    ),

                    'residential_community_price' => array(
                        'name' => 'residential_community_price',
                        'extendType' => 'residential_community_price',
                        'require' => 'no',
                    ),

                    'birthday_ahead_days' => array(
                        'name' => 'birthday_ahead_days',
                        'extendType' => 'birthday_ahead_days',
                        'require' => 'no',
                    ),

                    'shopping_behavior_jd' => array(
                        'name' => 'shopping_behavior_jd',
                        'extendType' => 'shopping_behavior_jd',
                        'require' => 'no',
                    ),

                    'category_58' => array(
                        'name' => 'category_58',
                        'extendType' => 'category_58',
                        'require' => 'no',
                    ),

                    'qq_wallet_user' => array(
                        'name' => 'qq_wallet_user',
                        'extendType' => 'qq_wallet_user',
                        'require' => 'no',
                    ),

                    'qq_wallet_shop' => array(
                        'name' => 'qq_wallet_shop',
                        'extendType' => 'qq_wallet_shop',
                        'require' => 'no',
                    ),

                    'media_category_mobile_qq' => array(
                        'name' => 'media_category_mobile_qq',
                        'extendType' => 'media_category_mobile_qq',
                        'require' => 'no',
                    ),

                ),
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
                        'type' => 'array',
                        'description' => '投放站点集合',
                        'restraint' => '当前仅支持单站点，取值详见 [link href="site_set_definition"]投放站点集合[/link]',
                        'errormsg' => '投放站点集合不正确',
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
                        'type' => 'string',
                        'description' => '标的物类型',
                        'restraint' => '详见 [link href="product_type"]标的物类型[/link]',
                        'errormsg' => '标的物类型不正确',
                        'list' => 'PRODUCT_TYPE_LINK,PRODUCT_TYPE_APP_IOS,PRODUCT_TYPE_APP_ANDROID_OPEN_PLATFORM,PRODUCT_TYPE_QZONE_PAGE_INDEX,PRODUCT_TYPE_QZONE_PAGE_ARTICLE,PRODUCT_TYPE_QZONE_PAGE_IFRAMED,PRODUCT_TYPE_LINK_WECHAT,PRODUCT_TYPE_LINK_JD,PRODUCT_TYPE_JD_ITEM,PRODUCT_TYPE_JD_SHOP,PRODUCT_TYPE_DIANPING_SHOP,PRODUCT_TYPE_DIANPING_COUPON,PRODUCT_TYPE_DIANPING_TUAN',
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
                    'name' => 'creative_struct',
                    'item_max_length' => '32',
                    'element' => array(
                        'creative_template_id' => array(
                            'name' => 'creative_template_id',
                            'extendType' => 'creative_template_id',
                            'require' => 'yes',
                            'type' => 'integer',
                            'description' => '素材规格Id',
                            'restraint' => '详见 [link href="creative_template_id"]素材规格Id[/link]',
                            'errormsg' => '素材规格Id不正确',
                        ),
    
                    ),
                )
            ),

        );
    }

}

//end of script
