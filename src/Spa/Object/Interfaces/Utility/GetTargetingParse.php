<?php 

namespace Spa\Object\Interfaces\Utility;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class GetTargetingParse
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetTargetingParse
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
                'require' => 'no',
                'type' => 'id',
                'description' => '定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '定向Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
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

        );
    }

}

//end of script
