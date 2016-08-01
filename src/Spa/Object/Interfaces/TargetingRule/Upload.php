<?php 

namespace Spa\Object\Interfaces\TargetingRule;



/**
 * Class Upload
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Upload {

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
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                
                
                
                'name' => 'advertiser_id',
            );

            'data_source' => array(
                'name' => 'data_source',
                'extendType' => 'data_source',
                'require' => 'yes',
                'type' => '',
                
                
                
                
                
                
                'name' => 'data_source',
            );

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'yes',
                'type' => 'string',
                'description' => '上传文件的内容md5',
                
                'errormsg' => '上传文件的内容md5不正确',
                'max_length' => '32',
                'min_length' => '32',
                
                'name' => 'file_md5',
            );
;
    }

}

//end of script
