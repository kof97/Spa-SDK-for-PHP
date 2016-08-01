<?php 

namespace Spa\Object\Interfaces\TargetingCustomizedAudience;



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

            'audience_name' => array(
                'name' => 'audience_name',
                'extendType' => 'audience_name',
                'require' => 'yes',
                'description' => '人群名称',
                'restraint' => '1-32个字符，不区分中英文',
                'errormsg' => '人群名称错误',
                'name' => 'audience_name',
                'name' => 'audience_name',
            );

            'data_type' => array(
                'name' => 'data_type',
                'extendType' => 'data_type',
                'require' => 'yes',
                'description' => '号码类型',
                'restraint' => '详见 [link href='dmp_audience_data_type']DMP自定义人群号码类型[/link]',
                'errormsg' => '人群号码类型错误',
                'name' => 'data_type',
                'name' => 'data_type',
            );

            'data_file' => array(
                'name' => 'data_file',
                'extendType' => 'data_file',
                'require' => 'yes',
                ,
                ,
                ,
                'name' => 'data_file',
                'name' => 'data_file',
            );

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'yes',
                'description' => '上传文件的内容md5',
                'restraint' => '如果本字段值与服务端接收文件的md5值不匹配则会报错',
                'errormsg' => '上传文件的内容md5不正确',
                'name' => 'file_md5',
                'name' => 'file_md5',
            );

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'description' => '描述',
                'restraint' => '0-100个字符',
                'errormsg' => '描述不正确',
                'name' => 'description',
                'name' => 'description',
            );
;
    }

}

//end of script
