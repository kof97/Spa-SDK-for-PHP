<?php 

namespace Spa\Object\Interfaces\Auth;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Ptlogin
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Ptlogin {

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

            'qq' => array(
                'name' => 'qq',
                'extendType' => 'qq',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '登录QQ号码',
                'restraint' => '小于2^63',
                'errormsg' => '登录QQ号码不正确',
                'max' => '9200000000000000000',
                'min' => '10000',
            ),

            'skey' => array(
                'name' => 'skey',
                'extendType' => 'skey',
                'require' => 'yes',
                'type' => 'string',
                'description' => '密钥APP KEY',
                'restraint' => '小于64字符',
                'errormsg' => 'skey不正确',
                'max_length' => '64',
                'min_length' => '1',
            ),

        );
    }

}

//end of script
