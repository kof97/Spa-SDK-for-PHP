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
            );

            'audience_name' => array(
                'name' => 'audience_name',
            );

            'data_type' => array(
                'name' => 'data_type',
            );

            'data_file' => array(
                'name' => 'data_file',
            );

            'file_md5' => array(
                'name' => 'file_md5',
            );

            'description' => array(
                'name' => 'description',
            );
;
    }

}

//end of script
