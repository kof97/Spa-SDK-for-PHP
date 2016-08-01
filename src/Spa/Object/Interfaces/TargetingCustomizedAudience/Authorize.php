<?php 

namespace Spa\Object\Interfaces\TargetingCustomizedAudience;



/**
 * Class Authorize
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Authorize {

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
            );

            'audience_id' => array(
                'name' => 'audience_id',
            );

            'authorized_advertiser_id' => array(
                'name' => 'authorized_advertiser_id',
            );

            'operation_type' => array(
                'name' => 'operation_type',
            );

            'description' => array(
                'name' => 'description',
            );
;
    }

}

//end of script
