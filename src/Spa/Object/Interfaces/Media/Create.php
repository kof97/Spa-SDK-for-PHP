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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'advertiser_id' => array(
                'name' => 'advertiser_id',
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'media_file' => array(
                'name' => 'media_file',
                'extendType' => 'media_file',
                'require' => 'yes',
                ,
                ,
                ,
                'name' => 'media_file',
                'name' => 'media_file',
            );

            'media_signature' => array(
                'name' => 'media_signature',
                'extendType' => 'media_signature',
                'require' => 'yes',
                'description' => '媒体签名，目前使用媒体的md5值',
                'restraint' => '32字符',
                'errormsg' => '媒体签名不正确',
                'name' => 'media_signature',
                'name' => 'media_signature',
            );

            'media_description' => array(
                'name' => 'media_description',
                'extendType' => 'media_description',
                'require' => 'no',
                'description' => '流媒体描述',
                'restraint' => '小于255字符',
                'errormsg' => '流媒体描述错误',
                'name' => 'media_description',
                'name' => 'media_description',
            );
;
    }

}

//end of script
