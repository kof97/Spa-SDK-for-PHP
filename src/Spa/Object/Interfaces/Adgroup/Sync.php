<?php 

namespace Spa\Object\Interfaces\Adgroup;

use Spa\Exceptions\ParamsException;

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
                    $this->validateString($data[$key], $key, $value);
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

    protected function validateString($data, $key, $value) {
        $len = strlen($value);
        if (isset($data['max_length'])) {
            if ($len > ($max_length = $data['max_length'])) {
                throw new ParamsException("The length of field '$key' is too long, it expects the length can't more than '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("The length of field '$key' is too short, it expects the length at least '$min_length'");
            }
        }

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("The value of field '$key' is limited in '$list'");
            }
        }

        if (isset($data['pattern'])) {
            $pattern = $data['pattern'];
            
        }
    }

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                throw new ParamsException("Expect the required params '$key' that you didn't provide");
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
                'type' => '',
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
                'type' => '',
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
                'type' => '',
            ),

            'bid_amount' => array(
                'name' => 'bid_amount',
                'extendType' => 'bid_amount',
                'require' => 'yes',
                'type' => '',
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
                'type' => '',
            ),

            'time_series' => array(
                'name' => 'time_series',
                'extendType' => 'time_series',
                'require' => 'no',
                'type' => '',
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

            'product_type' => array(
                'name' => 'product_type',
                'extendType' => 'product_type',
                'require' => 'yes',
                'type' => '',
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
                'type' => '',
            ),

            'creative_selection_type' => array(
                'name' => 'creative_selection_type',
                'extendType' => 'creative_selection_type',
                'require' => 'no',
                'type' => '',
            ),

            'customized_category' => array(
                'name' => 'customized_category',
                'extendType' => 'customized_category',
                'require' => 'no',
                'type' => '',
            ),

            'min_impression_include' => array(
                'name' => 'min_impression_include',
                'extendType' => 'min_impression_include',
                'require' => 'no',
                'type' => '',
            ),

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'type' => '',
            ),

            'click_tracking_url' => array(
                'name' => 'click_tracking_url',
                'extendType' => 'click_tracking_url',
                'require' => 'no',
                'type' => '',
            ),

            'creative_combination_type' => array(
                'name' => 'creative_combination_type',
                'extendType' => 'creative_combination_type',
                'require' => 'no',
                'type' => '',
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
