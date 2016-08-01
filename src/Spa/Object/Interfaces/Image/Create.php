<?php 

namespace Spa\Object\Interfaces\Image;



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

            'image_file' => array(
                'name' => 'image_file',
                'extendType' => 'image_file',
                'require' => 'yes',
                ,
                ,
                ,
                'name' => 'image_file',
                'name' => 'image_file',
            );

            'image_signature' => array(
                'name' => 'image_signature',
                'extendType' => 'image_signature',
                'require' => 'yes',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'name' => 'image_signature',
                'name' => 'image_signature',
            );

            'outer_image_id' => array(
                'name' => 'outer_image_id',
                'extendType' => 'outer_image_id',
                'require' => 'no',
                'description' => '外部图片id',
                'restraint' => '1024字符内',
                'errormsg' => '外部图片id不正确',
                'name' => 'outer_image_id',
                'name' => 'outer_image_id',
            );
;
    }

}

//end of script
