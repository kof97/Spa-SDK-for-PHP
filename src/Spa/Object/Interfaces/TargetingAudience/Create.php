<?php 

namespace Spa\Object\Interfaces\TargetingAudience;



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

            'audience_type' => array(
                'name' => 'audience_type',
            );

            'parent_audience_id' => array(
                'name' => 'parent_audience_id',
            );

            'data_type' => array(
                'name' => 'data_type',
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

            'combine_rule' => array(
                'name' => 'combine_rule',
            );

            'seed_audience_type' => array(
                'name' => 'seed_audience_type',
            );

            'seed_audience_id' => array(
                'name' => 'seed_audience_id',
            );

            'magnification' => array(
                'name' => 'magnification',
            );

            'combine_rule' => array(
                'name' => 'combine_rule',
            );

            'description' => array(
                'name' => 'description',
            );

            'refs_app_id' => array(
                'name' => 'refs_app_id',
            );

            'outer_audience_id' => array(
                'name' => 'outer_audience_id',
            );
;
    }

}

//end of script
