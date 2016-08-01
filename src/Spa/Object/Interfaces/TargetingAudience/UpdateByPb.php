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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField() {

    }

    protected function fieldInfo() {
        
        array(

            'operation_type' => array(
                'name' => 'operation_type',
            );

            'data_file' => array(
                'name' => 'data_file',
            );

            'file_name' => array(
                'name' => 'file_name',
            );

            'file_md5' => array(
                'name' => 'file_md5',
            );

            'refs_app_id' => array(
                'name' => 'refs_app_id',
            );
;
    }

}

//end of script
