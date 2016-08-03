<?php 

namespace Spa\Object\Interfaces\Account;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class SetDailyBudget
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SetDailyBudget
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

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'daily_budget',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '日限额，单位为分',
                'restraint' => '大于5000，且小于1000000000。账户日限额修改规则:1. 日限额的范围是50元-1000万元（请注意转换为分）2. 日限额的修改幅度不能低于50元（请注意转换为分）3. 日限额的最低金额不能低于账户今日消耗加上50元（请注意转换为分）',
                'errormsg' => '日消耗限额不正确',
                'max' => '1000000000',
                'min' => '5000',
            ),

        );
    }

}

//end of script
