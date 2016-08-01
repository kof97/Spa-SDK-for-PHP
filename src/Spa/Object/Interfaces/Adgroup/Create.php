<?php 

namespace Spa\Object\Interfaces\Adgroup;



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

            'campaign_id' => array(
                'name' => 'campaign_id',
            );

            'targeting_id' => array(
                'name' => 'targeting_id',
            );

            'adgroup_name' => array(
                'name' => 'adgroup_name',
            );

            'bid_type' => array(
                'name' => 'bid_type',
            );

            'bid_amount' => array(
                'name' => 'bid_amount',
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

            'outer_adgroup_id' => array(
                'name' => 'outer_adgroup_id',
            );

            'time_series' => array(
                'name' => 'time_series',
            );

            'product_type' => array(
                'name' => 'product_type',
            );

            'product_refs_id' => array(
                'name' => 'product_refs_id',
            );

            'subordinate_product_refs_id' => array(
                'name' => 'subordinate_product_refs_id',
            );

            'creative_selection_type' => array(
                'name' => 'creative_selection_type',
            );

            'customized_category' => array(
                'name' => 'customized_category',
            );

            'min_impression_include' => array(
                'name' => 'min_impression_include',
            );

            'max_impression_include' => array(
                'name' => 'max_impression_include',
            );

            'click_tracking_url' => array(
                'name' => 'click_tracking_url',
            );

            'creative_combination_type' => array(
                'name' => 'creative_combination_type',
            );

            'dynamic_creative_recommend_type' => array(
                'name' => 'dynamic_creative_recommend_type',
            );

            'configured_status' => array(
                'name' => 'configured_status',
            );

            'total_budget' => array(
                'name' => 'total_budget',
            );
;
    }

}

//end of script
