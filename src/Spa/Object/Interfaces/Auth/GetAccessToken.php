<?php 

namespace Spa\Object\Interfaces\Auth;



/**
 * Class GetAccessToken
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetAccessToken {

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

