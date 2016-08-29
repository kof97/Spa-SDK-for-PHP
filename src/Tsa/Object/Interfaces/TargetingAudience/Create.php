<?php 

namespace Tsa\Object\Interfaces\TargetingAudience;

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

            'audience_type' => array(
                'name' => 'audience_type',
                'extendType' => 'audience_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '人群类型，如：Meta、Combine、Lookalike',
                'restraint' => '详见 [link href="audience_type"]人群类型[/link]',
                'errormsg' => '人群类型不正确',
                'enum' => 'enum',
                'source' => 'api_audience_type',
            ),

            'parent_audience_id' => array(
                'name' => 'parent_audience_id',
                'extendType' => 'audience_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '人群规则id',
                'restraint' => '人群规则id',
                'errormsg' => '人群规则id不正确',
            ),

            'data_type' => array(
                'name' => 'data_type',
                'extendType' => 'data_type',
                'require' => 'no',
                'type' => 'string',
                'description' => '号码类型',
                'restraint' => '详见 [link href="dmp_audience_data_type"]自定义人群号码类型[/link]',
                'errormsg' => '人群号码类型错误',
                'enum' => 'enum',
                'source' => 'api_audience_data_type',
            ),

            'data_file' => array(
                'name' => 'data_file',
                'extendType' => 'data_file',
                'require' => 'no',
                'type' => '',
            ),

            'file_name' => array(
                'name' => 'file_name',
                'extendType' => 'file_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '文件名称',
                'restraint' => '小于32字符',
                'errormsg' => '文件名称不正确',
                'max_length' => '256',
                'min_length' => '1',
            ),

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'no',
                'type' => 'string',
                'description' => '上传文件的内容md5',
                'restraint' => '如果本字段值与服务端接收文件的md5值不匹配则会报错',
                'errormsg' => '上传文件的内容md5不正确',
                'max_length' => '32',
                'min_length' => '32',
            ),

            'combine_rule' => array(
                'name' => 'combine_rule',
                'extendType' => 'combine_rule',
                'require' => 'no',
                'type' => 'string',
                'description' => '组合规则',
                'restraint' => '不超过64000个字符，且不超过3层',
                'errormsg' => '组合规则不正确',
                'max_length' => '64000',
                'min_length' => '1',
                'pattern' => '/.*/',
            ),

            'seed_audience_type' => array(
                'name' => 'seed_audience_type',
                'extendType' => 'audience_type',
                'require' => 'no',
                'type' => 'string',
                'description' => '人群类型，如：Meta、Combine、Lookalike',
                'restraint' => '详见 [link href="audience_type"]人群类型[/link]',
                'errormsg' => '人群类型不正确',
                'enum' => 'enum',
                'source' => 'api_audience_type',
            ),

            'seed_audience_id' => array(
                'name' => 'seed_audience_id',
                'extendType' => 'audience_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '人群规则id',
                'restraint' => '人群规则id',
                'errormsg' => '人群规则id不正确',
            ),

            'magnification' => array(
                'name' => 'magnification',
                'extendType' => 'magnification',
                'require' => 'no',
                'type' => 'integer',
                'description' => '扩展倍数',
                'restraint' => '限1-100倍，且最多扩展到3000万覆盖人群',
                'errormsg' => '扩展倍数不正确',
                'max' => '100',
                'min' => '1',
            ),

            'combine_rule' => array(
                'name' => 'combine_rule',
                'extendType' => 'combine_rule',
                'require' => 'no',
                'type' => 'string',
                'description' => '组合规则',
                'restraint' => '不超过64000个字符，且不超过3层',
                'errormsg' => '组合规则不正确',
                'max_length' => '64000',
                'min_length' => '1',
                'pattern' => '/.*/',
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

            'refs_app_id' => array(
                'name' => 'refs_app_id',
                'extendType' => 'refs_app_id',
                'require' => 'no',
                'type' => 'string',
                'description' => 'OpenId对应的AppId',
                'restraint' => '1-128个字符',
                'errormsg' => 'AppId不正确',
                'max_length' => '128',
                'min_length' => '1',
            ),

            'outer_audience_id' => array(
                'name' => 'outer_audience_id',
                'extendType' => 'outer_audience_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '外部人群规则Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部人群规则Id不正确',
            ),

        );
    }

}

//end of script
