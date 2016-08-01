<?php 

namespace Spa\Object\Interfaces\Campaign;



/**
 * Class Update
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Update {

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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'advertiser_id' => array(
                'name' => 'advertiser_id',
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'campaign_id' => array(
                'name' => 'campaign_id',
                'extendType' => 'campaign_id',
                'require' => 'yes',
                'description' => '推广计划Id',
                'restraint' => '小于2^63',
                'errormsg' => '推广计划Id不正确',
                'name' => 'campaign_id',
                'name' => 'campaign_id',
            );

            'campaign_name' => array(
                'name' => 'campaign_name',
                'extendType' => 'campaign_name',
                'require' => 'no',
                'description' => '推广计划名称',
                'restraint' => '小于120个英文字符，不可与名下其他推广计划重名',
                'errormsg' => '推广计划名称不正确',
                'name' => 'campaign_name',
                'name' => 'campaign_name',
            );

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'daily_budget',
                'require' => 'no',
                'description' => '日消耗限额，单位为分',
                'restraint' => '大于5000，且小于400000000',
                'errormsg' => '日消耗限额不正确',
                'name' => 'daily_budget',
                'name' => 'daily_budget',
            );

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'total_budget',
                'require' => 'no',
                'description' => '总消耗限额，单位为分',
                'restraint' => '大于5000，且小于20000000000',
                'errormsg' => '总消耗限额不正确',
                'name' => 'total_budget',
                'name' => 'total_budget',
            );

            'speed_mode' => array(
                'name' => 'speed_mode',
                'extendType' => 'speed_mode',
                'require' => 'no',
                'description' => '标准投放类型',
                'restraint' => '详见 [link href='speed_mode']标准投放类型[/link]',
                'errormsg' => '标准投放类型不正确',
                'name' => 'speed_mode',
                'name' => 'speed_mode',
            );

            'retainability_in_feeds' => array(
                'name' => 'retainability_in_feeds',
                'extendType' => 'retainability_in_feeds',
                'require' => 'no',
                'description' => '沉淀模式',
                'restraint' => 'NO：不支持，YES：支持',
                'errormsg' => '沉淀模式不正确',
                'name' => 'retainability_in_feeds',
                'name' => 'retainability_in_feeds',
            );

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'description' => '最高曝光频次',
                'restraint' => '大于等于0、小于等于1000',
                'errormsg' => '最高曝光频次不正确',
                'name' => 'max_impression_include',
                'name' => 'max_impression_include',
            );

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'configured_status',
                'require' => 'no',
                'description' => '用户状态',
                'restraint' => '',
                'errormsg' => '用户状态不正确',
                'name' => 'configured_status',
                'name' => 'configured_status',
            );
;
    }

}

//end of script
