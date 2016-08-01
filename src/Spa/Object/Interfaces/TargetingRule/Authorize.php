<?php 

namespace Spa\Object\Interfaces\TargetingRule;



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

            'operation_type' => array(
                'name' => 'operation_type',
            );

            'rule_id' => array(
                'name' => 'rule_id',
            );

            'to_advertiser_id' => array(
                'name' => 'to_advertiser_id',
            );

            'to_rule_id' => array(
                'name' => 'to_rule_id',
            );

            'description' => array(
                'name' => 'description',
            );
;
    }

}

//end of script
