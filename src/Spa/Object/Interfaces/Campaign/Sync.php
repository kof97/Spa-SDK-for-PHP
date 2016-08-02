<?php 

namespace Spa\Object\Interfaces\Campaign;



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

            'outer_campaign_id' => array(
                'name' => 'outer_campaign_id',
                'extendType' => 'outer_campaign_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部推广计划Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部推广计划Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'campaign_name' => array(
                'name' => 'campaign_name',
                'extendType' => 'campaign_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '推广计划名称',
                'restraint' => '小于120个英文字符，不可与名下其他推广计划重名',
                'errormsg' => '推广计划名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'campaign_type' => array(
                'name' => 'campaign_type',
                'extendType' => 'campaign_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '推广计划类型',
                'restraint' => '详见 [link href="campaign_type"]推广计划类型[/link]',
                'errormsg' => '推广计划类型不正确',
                'enum' => 'enum',
                'source' => 'api_campaign_type',
            ),

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'account.unlimited_daily_budget',
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
                    

                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'item_max_length' => '255',
                    'enum' => 'enum',
                    'source' => 'api_site_set_definition',
                )
            ),

            'time_series' => array(
                'name' => 'time_series',
                'extendType' => 'adgroup.time_series',
                'require' => 'no',
                'type' => '',
            ),

            'speed_mode' => array(
                'name' => 'speed_mode',
                'extendType' => 'speed_mode',
                'require' => 'no',
                'type' => 'string',
                'description' => '标准投放类型',
                'restraint' => '详见 [link href="speed_mode"]标准投放类型[/link]',
                'errormsg' => '标准投放类型不正确',
                'enum' => 'enum',
                'source' => 'api_speed_mode',
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
