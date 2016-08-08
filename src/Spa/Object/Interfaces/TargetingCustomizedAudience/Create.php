<?php 

namespace Spa\Object\Interfaces\TargetingCustomizedAudience;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Create
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Create
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

            'audience_name' => array(
                'name' => 'audience_name',
                'extendType' => 'audience_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '人群名称',
                'restraint' => '1-32个字符，不区分中英文',
                'errormsg' => '人群名称错误',
                'max_length' => '96',
                'min_length' => '1',
            ),

            'data_type' => array(
                'name' => 'data_type',
                'extendType' => 'data_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '号码类型',
                'restraint' => '详见 [link href="dmp_audience_data_type"]DMP自定义人群号码类型[/link]',
                'errormsg' => '人群号码类型错误',
                'enum' => 'enum',
                'source' => 'ApiAudienceDataType',
            ),

            'data_file' => array(
                'name' => 'data_file',
                'extendType' => 'data_file',
                'require' => 'yes',
                'type' => '',
            ),

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'yes',
                'type' => 'string',
                'description' => '上传文件的内容md5',
                'restraint' => '如果本字段值与服务端接收文件的md5值不匹配则会报错',
                'errormsg' => '上传文件的内容md5不正确',
                'max_length' => '32',
                'min_length' => '32',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => 'string',
                'description' => '描述',
                'restraint' => '0-100个字符',
                'errormsg' => '描述不正确',
                'max_length' => '300',
                'min_length' => '1',
            ),

        );
    }

}

//end of script
