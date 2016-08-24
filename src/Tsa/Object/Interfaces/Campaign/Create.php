<?php 

namespace Tsa\Object\Interfaces\Campaign;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class Create
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Create
{
    /**
     * Instance of Tsa.
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
                'extendType' => 'daily_budget',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '日消耗限额，单位为分',
                'restraint' => '大于5000，且小于400000000',
                'errormsg' => '日消耗限额不正确',
                'max' => '400000000',
                'min' => '5000',
            ),

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'total_budget',
                'require' => 'no',
                'type' => 'integer',
                'description' => '总消耗限额，单位为分',
                'restraint' => '大于5000，且小于20000000000',
                'errormsg' => '总消耗限额不正确',
                'max' => '20000000000',
                'min' => '5000',
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

            'pv_demanded' => array(
                'name' => 'pv_demanded',
                'extendType' => 'pv_demanded',
                'require' => 'no',
                'type' => 'integer',
                'description' => '每日购买PV量',
                'restraint' => '大于1000小于42亿',
                'errormsg' => '每日购买PV量不正确',
                'max' => '4200000000',
                'min' => '1000',
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

            'retainability_in_feeds' => array(
                'name' => 'retainability_in_feeds',
                'extendType' => 'retainability_in_feeds',
                'require' => 'no',
                'type' => 'string',
                'description' => '沉淀模式',
                'restraint' => 'NO：不支持，YES：支持',
                'errormsg' => '沉淀模式不正确',
                'enum' => 'enum',
                'source' => 'api_boolean',
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
