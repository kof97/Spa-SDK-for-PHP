<?php 

namespace Spa\Object\Interfaces\Advertiser;

use Spa\Exceptions\ParamsException;
use Spa\Object\Detector\FieldsDetector;

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

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    public function fieldInfo() {
        return array(

            'customer_registration_type' => array(
                'name' => 'customer_registration_type',
                'extendType' => 'customer_registration_type',
                'require' => 'no',
                'type' => '',
            ),

            'product_type_set' => array(
                'name' => 'product_type_set',
                'extendType' => 'product_type_set',
                'require' => 'no',
                'type' => '',
            ),

            'login_name' => array(
                'name' => 'login_name',
                'extendType' => 'login_name',
                'require' => 'no',
                'type' => '',
            ),

            'advertiser_name' => array(
                'name' => 'advertiser_name',
                'extendType' => 'advertiser_name',
                'require' => 'no',
                'type' => '',
            ),

            'corporation_name' => array(
                'name' => 'corporation_name',
                'extendType' => 'corporation_name',
                'require' => 'no',
                'type' => '',
            ),

            'certification_image_id' => array(
                'name' => 'certification_image_id',
                'extendType' => 'certification_image_id',
                'require' => 'no',
                'type' => '',
            ),

            'industry_id' => array(
                'name' => 'industry_id',
                'extendType' => 'industry_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '最细一级行业分类（最细有3级）',
                'restraint' => '详见 [link href="industry_id"]新行业分类[/link]',
                'errormsg' => '行业分类不正确',
                'max' => '1000000000000',
                'min' => '0',
            ),

            'qualification_image_id_list' => array(
                'name' => 'qualification_image_id_list',
                'extendType' => 'image_id_list',
                'require' => 'no',
                'type' => '',
            ),

            'website' => array(
                'name' => 'website',
                'extendType' => 'website',
                'require' => 'no',
                'type' => '',
            ),

            'site_name' => array(
                'name' => 'site_name',
                'extendType' => 'site_name',
                'require' => 'no',
                'type' => '',
            ),

            'icp_image_id' => array(
                'name' => 'icp_image_id',
                'extendType' => 'image_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'max_length' => '64',
                'min_length' => '1',
            ),

            'individual_qualification' => array(
                'name' => 'individual_qualification',
                'extendType' => 'individual_qualification',
                'require' => 'no',
                'type' => '',
            ),

            'contact_person' => array(
                'name' => 'contact_person',
                'extendType' => 'contact_person',
                'require' => 'no',
                'type' => '',
            ),

            'contact_person_email' => array(
                'name' => 'contact_person_email',
                'extendType' => 'contact_person_email',
                'require' => 'no',
                'type' => '',
            ),

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
                'extendType' => 'contact_person_mobile',
                'require' => 'no',
                'type' => '',
            ),

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
                'extendType' => 'contact_person_telephone',
                'require' => 'no',
                'type' => '',
            ),

            'contact_person_qq' => array(
                'name' => 'contact_person_qq',
                'extendType' => 'contact_person_qq',
                'require' => 'no',
                'type' => '',
            ),

            'address' => array(
                'name' => 'address',
                'extendType' => 'address',
                'require' => 'no',
                'type' => '',
            ),

            'corporate_reg_no' => array(
                'name' => 'corporate_reg_no',
                'extendType' => 'corporate_reg_no',
                'require' => 'no',
                'type' => '',
            ),

            'legal_person_id' => array(
                'name' => 'legal_person_id',
                'extendType' => 'legal_person_id',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
