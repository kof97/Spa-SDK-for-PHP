<?php 

namespace Tsa\Object\Interfaces\Auth;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class GetAccessToken
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetAccessToken
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

            'app_id' => array(
                'name' => 'app_id',
                'extendType' => 'app_id',
                'require' => 'yes',
                'type' => 'string',
                'description' => '合作方APP ID',
                'restraint' => '小于32字符',
                'errormsg' => '合作方APP ID不正确',
                'max_length' => '32',
                'min_length' => '1',
            ),

            'app_key' => array(
                'name' => 'app_key',
                'extendType' => 'app_key',
                'require' => 'yes',
                'type' => 'string',
                'description' => '密钥APP KEY',
                'restraint' => '小于32字符',
                'errormsg' => '密钥APP KEY不正确',
                'max_length' => '32',
                'min_length' => '1',
            ),

            'authorization_code' => array(
                'name' => 'authorization_code',
                'extendType' => 'authorization_code',
                'require' => 'yes',
                'type' => 'string',
                'description' => 'authorization_code，用于换取access_token',
                'restraint' => '不大于64个英文字符',
                'errormsg' => 'authorization_code不正确',
                'max_length' => '64',
                'min_length' => '1',
            ),

        );
    }

}

//end of script
