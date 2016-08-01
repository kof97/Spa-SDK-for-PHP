<?php 

namespace Spa\Object\Interfaces\Campaign;



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

            'campaign_id' => array(
                'name' => 'campaign_id',
            );

            'outer_campaign_id' => array(
                'name' => 'outer_campaign_id',
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

            'configured_status' => array(
                'name' => 'configured_status',
            );

            'begin_date' => array(
                'name' => 'begin_date',
            );

            'end_date' => array(
                'name' => 'end_date',
            );

            'site_set' => array(
                'name' => 'site_set',
            );

            'time_series' => array(
                'name' => 'time_series',
            );

            'speed_mode' => array(
                'name' => 'speed_mode',
            );

            'outer_version' => array(
                'name' => 'outer_version',
            );
;
    }

}

//end of script
