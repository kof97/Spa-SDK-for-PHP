<?php 

namespace Spa\Object\Interfaces\Targeting;



/**
 * Class Sync
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Sync {

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

            'targeting_id' => array(
                'name' => 'targeting_id',
            );

            'targeting_name' => array(
                'name' => 'targeting_name',
            );

            'ui_visibility' => array(
                'name' => 'ui_visibility',
            );

            'description' => array(
                'name' => 'description',
            );

            'targeting_setting' => array(
                'name' => 'targeting_setting',
            );

            'configured_status' => array(
                'name' => 'configured_status',
            );

            'outer_targeting_id' => array(
                'name' => 'outer_targeting_id',
            );

            'outer_version' => array(
                'name' => 'outer_version',
            );
;
    }

}

//end of script
