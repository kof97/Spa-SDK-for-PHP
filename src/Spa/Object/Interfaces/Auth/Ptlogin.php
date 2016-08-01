<?php 

namespace Spa\Object\Interfaces\Auth;



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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'app_id' => array(
                'name' => 'app_id',
            );

            'app_key' => array(
                'name' => 'app_key',
            );

            'qq' => array(
                'name' => 'qq',
            );

            'skey' => array(
                'name' => 'skey',
            );
;
    }

}

//end of script
