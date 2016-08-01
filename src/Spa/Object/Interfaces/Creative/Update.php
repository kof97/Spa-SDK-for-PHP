<?php 

namespace Spa\Object\Interfaces\Creative;



/**
 * Class Update
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Update {

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

            'creative_id' => array(
                'name' => 'creative_id',
            );

            'creative_name' => array(
                'name' => 'creative_name',
            );

            'creative_template_id' => array(
                'name' => 'creative_template_id',
            );

            'creative_elements' => array(
                'name' => 'creative_elements',
            );

            'destination_url' => array(
                'name' => 'destination_url',
            );

            'impression_tracking_url' => array(
                'name' => 'impression_tracking_url',
            );

            'dynamic_creative_template_id' => array(
                'name' => 'dynamic_creative_template_id',
            );

            'dynamic_creative_material_label' => array(
                'name' => 'dynamic_creative_material_label',
            );

            'configured_status' => array(
                'name' => 'configured_status',
            );
;
    }

}

//end of script
