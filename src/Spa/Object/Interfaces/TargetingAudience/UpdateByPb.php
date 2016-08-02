<?php 

namespace Spa\Object\Interfaces\TargetingAudience;



/**
 * Class UpdateByPb
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateByPb {

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

            var_dump($params[$key]);
            //var_dump($key);
            //var_dump($value);
        }
    }

    public function fieldInfo() {
        return array(

            'operation_type' => array(
                'name' => 'operation_type',
                'extendType' => 'audience_operation_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '操作类型，包括APPEND、REDUCE',
                'restraint' => '详见 [link href="api_audience_option_type"]操作类型[/link]',
                'errormsg' => '操作类型不正确',
                'enum' => 'enum',
                'source' => 'api_audience_operation_type',
            ),

            'data_file' => array(
                'name' => 'data_file',
                'extendType' => 'data_file',
                'require' => 'yes',
                'type' => '',
            ),

            'file_name' => array(
                'name' => 'file_name',
                'extendType' => 'file_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '文件名称',
                'restraint' => '小于32字符',
                'errormsg' => '文件名称不正确',
                'max_length' => '256',
                'min_length' => '1',
            ),

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'yes',
                'type' => 'string',
                'description' => '上传文件的内容md5',
                'restraint' => '如果本字段值与服务端接收文件的md5值不匹配则会报错',
                'errormsg' => '上传文件的内容md5不正确',
                'max_length' => '32',
                'min_length' => '32',
            ),

            'refs_app_id' => array(
                'name' => 'refs_app_id',
                'extendType' => 'refs_app_id',
                'require' => 'no',
                'type' => 'string',
                'description' => 'OpenId对应的AppId',
                'restraint' => '1-128个字符',
                'errormsg' => 'AppId不正确',
                'max_length' => '128',
                'min_length' => '1',
            ),

        );
    }

}

//end of script
