<?php 

namespace Spa\Object\Interfaces\Image;



/**
 * Class Preview
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Preview {

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

        $this->method = 'GET';

        $this->endpoint = $mod . '/' . $act;

    }

    public function send($params = array(), $headers = array()) {

        $this->validateField($params);

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }


        $data = $this->fieldInfo();

        foreach ($params as $key => $value) {
            

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

    public function fieldInfo() {
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

            'image_id' => array(
                'name' => 'image_id',
                'extendType' => 'image_id',
                'require' => 'yes',
                'type' => 'string',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'max_length' => '64',
                'min_length' => '1',
            ),

            'sign' => array(
                'name' => 'sign',
                'extendType' => 'sign',
                'require' => 'yes',
                'type' => 'string',
                'description' => '图片签名',
                'restraint' => '图片签名',
                'errormsg' => '图片签名不正确',
                'max_length' => '32',
                'min_length' => '32',
            ),

        );
    }

}

//end of script
