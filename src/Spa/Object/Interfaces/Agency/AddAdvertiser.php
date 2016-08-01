<?php 

namespace Spa\Object\Interfaces\Agency;



/**
 * Class AddAdvertiser
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class AddAdvertiser {

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

            'corporation_name' => array(
                'name' => 'corporation_name',
                'extendType' => 'advertiser.corporation_name',
                'require' => 'yes',
                ,
                ,
                ,
                'name' => 'corporation_name',
                'name' => 'corporation_name',
            );

            'certification_image_id' => array(
                'name' => 'certification_image_id',
                'extendType' => 'image_id',
                'require' => 'yes',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'name' => 'certification_image_id',
                'name' => 'certification_image_id',
            );

            'industry_id' => array(
                'name' => 'industry_id',
                'extendType' => 'industry_id',
                'require' => 'yes',
                'description' => '最细一级行业分类（最细有3级）',
                'restraint' => '详见 [link href='industry_id']新行业分类[/link]',
                'errormsg' => '行业分类不正确',
                'name' => 'industry_id',
                'name' => 'industry_id',
            );

            'outer_advertiser_id' => array(
                'name' => 'outer_advertiser_id',
                'extendType' => 'advertiser.outer_advertiser_id',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'outer_advertiser_id',
                'name' => 'outer_advertiser_id',
            );

            'qualification_image_id_list' => array(
                'name' => 'qualification_image_id_list',
                'extendType' => 'advertiser.image_id_list',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'qualification_image_id_list',
                'name' => 'qualification_image_id_list',
            );

            'ad_qualification_image_id_list' => array(
                'name' => 'ad_qualification_image_id_list',
                'extendType' => 'advertiser.image_id_list',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'ad_qualification_image_id_list',
                'name' => 'ad_qualification_image_id_list',
            );

            'website' => array(
                'name' => 'website',
                'extendType' => 'advertiser.website',
                'require' => 'yes',
                ,
                ,
                ,
                'name' => 'website',
                'name' => 'website',
            );

            'icp_image_id' => array(
                'name' => 'icp_image_id',
                'extendType' => 'image_id',
                'require' => 'yes',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'name' => 'icp_image_id',
                'name' => 'icp_image_id',
            );

            'corporation_image_name' => array(
                'name' => 'corporation_image_name',
                'extendType' => 'advertiser.corporation_image_name',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'corporation_image_name',
                'name' => 'corporation_image_name',
            );

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
                'extendType' => 'advertiser.contact_person_telephone',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'contact_person_telephone',
                'name' => 'contact_person_telephone',
            );

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
                'extendType' => 'advertiser.contact_person_mobile',
                'require' => 'no',
                ,
                ,
                ,
                'name' => 'contact_person_mobile',
                'name' => 'contact_person_mobile',
            );
;
    }

}

//end of script
