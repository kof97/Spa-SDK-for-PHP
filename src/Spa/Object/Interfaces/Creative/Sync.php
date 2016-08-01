<?php 

namespace Spa\Object\Interfaces\Creative;



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

            'creative_id' => array(
                'name' => 'creative_id',
            );

            'outer_creative_id' => array(
                'name' => 'outer_creative_id',
            );

            'campaign_id' => array(
                'name' => 'campaign_id',
            );

            'adgroup_id' => array(
                'name' => 'adgroup_id',
            );

            'creative_name' => array(
                'name' => 'creative_name',
            );

            'configured_status' => array(
                'name' => 'configured_status',
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

            'outer_version' => array(
                'name' => 'outer_version',
            );
;
    }

}

//end of script
