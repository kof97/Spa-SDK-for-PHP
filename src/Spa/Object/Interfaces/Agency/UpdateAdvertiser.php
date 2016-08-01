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
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                ,
                'name' => 'advertiser_id',
            );

            'corporation_name' => array(
                'name' => 'corporation_name',
                'extendType' => 'advertiser.corporation_name',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'corporation_name',
            );

            'certification_image_id' => array(
                'name' => 'certification_image_id',
                'extendType' => 'image_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'max_length' => '64',
                'name' => 'certification_image_id',
            );

            'industry_id' => array(
                'name' => 'industry_id',
                'extendType' => 'industry_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '最细一级行业分类（最细有3级）',
                'restraint' => '详见 [link href="industry_id"]新行业分类[/link]',
                'errormsg' => '行业分类不正确',
                ,
                'name' => 'industry_id',
            );

            'qualification_image_id_list' => array(
                'name' => 'qualification_image_id_list',
                'extendType' => 'advertiser.image_id_list',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'qualification_image_id_list',
            );

            'ad_qualification_image_id_list' => array(
                'name' => 'ad_qualification_image_id_list',
                'extendType' => 'advertiser.image_id_list',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'ad_qualification_image_id_list',
            );

            'website' => array(
                'name' => 'website',
                'extendType' => 'advertiser.website',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'website',
            );

            'icp_image_id' => array(
                'name' => 'icp_image_id',
                'extendType' => 'image_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'max_length' => '64',
                'name' => 'icp_image_id',
            );

            'corporation_image_name' => array(
                'name' => 'corporation_image_name',
                'extendType' => 'advertiser.corporation_image_name',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'corporation_image_name',
            );

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
                'extendType' => 'advertiser.contact_person_telephone',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'contact_person_telephone',
            );

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
                'extendType' => 'advertiser.contact_person_mobile',
                'require' => 'no',
                'type' => '',
                ,
                ,
                ,
                ,
                'name' => 'contact_person_mobile',
            );
;
    }

}

//end of script
