<?php 

namespace Spa\Object\Interfaces\Auth;



/**
 * Class GetOpenid
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetOpenid {

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
                
                
                
                
                
                
                'name' => 'app_id',
            );
;
    }

}

//end of script
