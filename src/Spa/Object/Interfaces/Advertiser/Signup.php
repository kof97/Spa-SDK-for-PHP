<?php 

namespace Spa\Object\Interfaces\Advertiser;



/**
 * Class Signup
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Signup {

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

            'customer_registration_type' => array(
                'name' => 'customer_registration_type',
            );

            'product_type_set' => array(
                'name' => 'product_type_set',
            );

            'login_name' => array(
                'name' => 'login_name',
            );

            'advertiser_name' => array(
                'name' => 'advertiser_name',
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

            'website' => array(
                'name' => 'website',
            );

            'site_name' => array(
                'name' => 'site_name',
            );

            'icp_image_id' => array(
                'name' => 'icp_image_id',
            );

            'individual_qualification' => array(
                'name' => 'individual_qualification',
            );

            'contact_person' => array(
                'name' => 'contact_person',
            );

            'contact_person_email' => array(
                'name' => 'contact_person_email',
            );

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
            );

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
            );

            'contact_person_qq' => array(
                'name' => 'contact_person_qq',
            );

            'address' => array(
                'name' => 'address',
            );

            'corporate_reg_no' => array(
                'name' => 'corporate_reg_no',
            );

            'legal_person_id' => array(
                'name' => 'legal_person_id',
            );
;
    }

}

//end of script
