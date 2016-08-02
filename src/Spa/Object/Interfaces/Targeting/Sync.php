<?php 

namespace Spa\Object\Interfaces\Targeting;



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

        // validate the required field
        $this->validateRequireField($data, $params);

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

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            var_dump($params[$key]);
            //var_dump($key);
            //var_dump($value);
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
