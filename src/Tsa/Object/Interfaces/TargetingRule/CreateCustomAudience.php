<?php 

namespace Tsa\Object\Interfaces\TargetingRule;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class CreateCustomAudience
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateCustomAudience
{
    /**
     * Instance of Tsa.
     */
    protected $tsa;

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
    public function __construct($tsa, $mod, $act)
    {
        $this->tsa = $tsa;

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

        $response = $this->tsa->sendRequest($this->method, $this->endpoint, $params, $headers);

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

        $response = $this->tsa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

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
                'type' => 'id',
                'description' => '用户ID（服务商ID/直客ID/子客户ID）',
                'restraint' => '详见附录',
                'errormsg' => '用户ID（服务商ID/直客ID/子客户ID）不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'rule_name' => array(
                'name' => 'rule_name',
                'extendType' => 'rule_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '规则名称',
                'restraint' => '不超过90个英文字符',
                'errormsg' => '规则名称不正确',
                'max_length' => '90',
                'min_length' => '1',
            ),

            'rule_type' => array(
                'name' => 'rule_type',
                'extendType' => 'rule_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '号码类型',
                'restraint' => '详见 [link href="custom_audience_rule_type"]号码类型列表[/link]',
                'errormsg' => '号码类型不正确',
                'enum' => 'enum',
                'source' => 'api_custom_audience_rule_type',
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
