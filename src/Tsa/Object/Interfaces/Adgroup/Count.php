<?php 

namespace Tsa\Object\Interfaces\Adgroup;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class Count
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Count
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

        $this->method = 'GET';

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
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'max' => '4294967296',
                'min' => '0',
            ),

            'where' => array(
                'name' => 'where',
                'extendType' => 'where',
                'require' => 'no',
                'type' => 'struct',
                'description' => '过滤条件',
                'restraint' => '若此字段不传，或传空则视为无限制条件。例{"status":"AD_STATUS_NORMAL"}, 可选过滤字段：status',
                'errormsg' => '过滤条件不正确',
                'element' => array(
                    'status' => array(
                        'name' => 'status',
                        'extendType' => 'status',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => '状态',
                        'restraint' => '状态定义',
                        'errormsg' => '状态不正确',
                        'list' => 'AD_STATUS_NORMAL,AD_STATUS_SUSPEND,AD_STATUS_PENDING',
                        'enum' => 'enum',
                        'source' => 'api_ad_status',
                    ),

                ),
            ),

            'group_by' => array(
                'name' => 'group_by',
                'extendType' => 'group_by',
                'require' => 'yes',
                'type' => 'array',
                'description' => '聚合字段',
                'restraint' => '目前支持configured_status，system_status 例：["status, system_status"]',
                'errormsg' => '聚合字段不正确',
                'list' => 'configured_status,system_status',
                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'list' => 'configured_status,system_status',
                    'item_max_length' => '255',
                )
            ),

        );
    }

}

//end of script
