<?php 

namespace Spa\Object\Interfaces\Creative;

use Spa\Object\Detector\FieldsDetector;

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

            'creative_id' => array(
                'name' => 'creative_id',
                'extendType' => 'creative_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '广告素材Id',
                'restraint' => '小于2^63',
                'errormsg' => '广告素材Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'outer_creative_id' => array(
                'name' => 'outer_creative_id',
                'extendType' => 'outer_creative_id',
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

            'creative_name' => array(
                'name' => 'creative_name',
                'extendType' => 'creative_name',
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

            'creative_template_id' => array(
                'name' => 'creative_template_id',
                'extendType' => 'creative_template_id',
                'require' => 'yes',
                'type' => '',
            ),

            'creative_elements' => array(
                'name' => 'creative_elements',
                'extendType' => 'creative_elements',
                'require' => 'yes',
                'type' => '',
            ),

            'destination_url' => array(
                'name' => 'destination_url',
                'extendType' => 'destination_url',
                'require' => 'no',
                'type' => '',
            ),

            'impression_tracking_url' => array(
                'name' => 'impression_tracking_url',
                'extendType' => 'impression_tracking_url',
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
