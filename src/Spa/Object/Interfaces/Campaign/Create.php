<?php 

namespace Spa\Object\Interfaces\Campaign;

use Spa\Exceptions\ParamsException;
use Spa\Object\Detector\FieldsDetector;

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

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
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
                'type' => '',
            ),

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'daily_budget',
                'require' => 'yes',
                'type' => '',
            ),

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'total_budget',
                'require' => 'no',
                'type' => '',
            ),

            'speed_mode' => array(
                'name' => 'speed_mode',
                'extendType' => 'speed_mode',
                'require' => 'no',
                'type' => '',
            ),

            'pv_demanded' => array(
                'name' => 'pv_demanded',
                'extendType' => 'pv_demanded',
                'require' => 'no',
                'type' => '',
            ),

            'outer_campaign_id' => array(
                'name' => 'outer_campaign_id',
                'extendType' => 'outer_campaign_id',
                'require' => 'no',
                'type' => '',
            ),

            'retainability_in_feeds' => array(
                'name' => 'retainability_in_feeds',
                'extendType' => 'retainability_in_feeds',
                'require' => 'no',
                'type' => '',
            ),

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'type' => '',
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

        );
    }

}

//end of script
