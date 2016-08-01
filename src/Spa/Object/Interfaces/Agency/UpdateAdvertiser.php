<?php 

namespace Spa\Object\Interfaces\Agency;



/**
 * Class UpdateAdvertiser
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateAdvertiser {

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

            'corporation_name' => array(
                'name' => 'corporation_name',
            );

            'certification_image_id' => array(
                'name' => 'certification_image_id',
            );

            'industry_id' => array(
                'name' => 'industry_id',
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
;
    }

}

//end of script
