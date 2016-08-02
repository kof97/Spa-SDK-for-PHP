<?php 

namespace Spa\Object\Interfaces\Media;



/**
 * Class Create
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Create {

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

            'media_file' => array(
                'name' => 'media_file',
                'extendType' => 'media_file',
                'require' => 'yes',
                'type' => '',
            ),

            'media_signature' => array(
                'name' => 'media_signature',
                'extendType' => 'media_signature',
                'require' => 'yes',
                'type' => 'string',
                'description' => '媒体签名，目前使用媒体的md5值',
                'restraint' => '32字符',
                'errormsg' => '媒体签名不正确',
                'max_length' => '32',
                'min_length' => '1',
            ),

            'media_description' => array(
                'name' => 'media_description',
                'extendType' => 'media_description',
                'require' => 'no',
                'type' => 'string',
                'description' => '流媒体描述',
                'restraint' => '小于255字符',
                'errormsg' => '流媒体描述错误',
                'max_length' => '255',
                'min_length' => '0',
            ),

        );
    }

}

//end of script
