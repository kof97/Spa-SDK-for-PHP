<?php 

namespace Spa\Object\Interfaces\Utility;



/**
 * Class GetLocationList
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetLocationList {

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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'region_id' => array(
                'name' => 'region_id',
                'extendType' => 'region_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '城市ID',
                'restraint' => '城市ID是六位的数字',
                'errormsg' => '城市ID不正确',
                'max' => '999999',
                'min' => '0',
            ),

    }

}

//end of script
