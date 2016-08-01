<?php 

namespace Spa\Object\Interfaces\Campaign;



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

            'campaign_name' => array(
                'name' => 'campaign_name',
            );

            'campaign_type' => array(
                'name' => 'campaign_type',
            );

            'daily_budget' => array(
                'name' => 'daily_budget',
            );

            'total_budget' => array(
                'name' => 'total_budget',
            );

            'speed_mode' => array(
                'name' => 'speed_mode',
            );

            'pv_demanded' => array(
                'name' => 'pv_demanded',
            );

            'outer_campaign_id' => array(
                'name' => 'outer_campaign_id',
            );

            'retainability_in_feeds' => array(
                'name' => 'retainability_in_feeds',
            );

            'max_impression_include' => array(
                'name' => 'max_impression_include',
            );

            'configured_status' => array(
                'name' => 'configured_status',
            );
;
    }

}

//end of script
