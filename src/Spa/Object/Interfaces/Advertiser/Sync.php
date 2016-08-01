<?php 

namespace Spa\Object\Interfaces\Advertiser;



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

            'outer_advertiser_id' => array(
                'name' => 'outer_advertiser_id',
            );

            'corporation_name' => array(
                'name' => 'corporation_name',
            );

            'certification_image_id' => array(
                'name' => 'certification_image_id',
            );

            'industry_id' => array(
                'name' => 'industry_id',
            );

            'daily_budget' => array(
                'name' => 'daily_budget',
            );

            'qualification_image_id_list' => array(
                'name' => 'qualification_image_id_list',
            );

            'ad_qualification_image_id_list' => array(
                'name' => 'ad_qualification_image_id_list',
            );

            'website' => array(
                'name' => 'website',
            );

            'icp_image_id' => array(
                'name' => 'icp_image_id',
            );

            'corporation_image_name' => array(
                'name' => 'corporation_image_name',
            );

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
            );

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
            );

            'outer_extend_info' => array(
                'name' => 'outer_extend_info',
            );

            'outer_version' => array(
                'name' => 'outer_version',
            );
;
    }

}

//end of script
