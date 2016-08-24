<?php 

namespace Tsa\Object\Interfaces\TargetingRule;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class Authorize
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Authorize
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

            'operation_type' => array(
                'name' => 'operation_type',
                'extendType' => 'operation_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '操作类型',
                'restraint' => '详见 [link href="operation_type"]操作类型[/link]',
                'errormsg' => '操作类型不正确',
                'enum' => 'enum',
                'source' => 'api_operation_type',
            ),

            'rule_id' => array(
                'name' => 'rule_id',
                'extendType' => 'rule_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '规则id',
                'restraint' => '规则id',
                'errormsg' => '规则id不正确',
            ),

            'to_advertiser_id' => array(
                'name' => 'to_advertiser_id',
                'extendType' => 'to_advertiser_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '广告主Id（子客户）',
                'restraint' => '广告主Id（子客户）',
                'errormsg' => '广告主Id（子客户）不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'to_rule_id' => array(
                'name' => 'to_rule_id',
                'extendType' => 'to_rule_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '授权后，子客户的规则id；删除授权时必填',
                'restraint' => '删除授权时为必填',
                'errormsg' => '被授权的规则id不正确',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => 'string',
                'description' => '受众描述',
                'restraint' => '不超过250个英文字符',
                'errormsg' => '受众描述不正确',
                'max_length' => '250',
                'min_length' => '0',
            ),

        );
    }

}

//end of script