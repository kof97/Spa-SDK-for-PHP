<?php 

namespace Spa\Object\Interfaces\Auth;

use Spa\Exceptions\ParamsException;

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

        $this->validateField($params);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }

        $data = $this->fieldInfo();

        // validate the required field
        $this->validateRequireField($data, $params);

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

            $type = $data[$key]['type'];
            switch ($type) {
                case 'string':
                    
                    break;

                case 'integer':
                    
                    break;

                case 'id':

                case 'number':
                    
                    break;

                case 'struct':
                    
                    break;

                case 'array':
                    
                    break;

                default: break;
            }
        }
    }

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                throw new ParamsException("Expect the required params '$key' that you didn't provide");
                
            }
        }
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
