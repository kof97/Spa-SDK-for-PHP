<?php 

namespace Spa\Object\Interfaces\Campaign;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class SetDailyBudget
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SetDailyBudget {

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
    public function __construct($spa, $mod, $act) {

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
    public function send($params = array(), $headers = array(), $access_token = null) {

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

        return $response;
    }

    /**
     * The fields info.
     */
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

        );
    }

}

//end of script
