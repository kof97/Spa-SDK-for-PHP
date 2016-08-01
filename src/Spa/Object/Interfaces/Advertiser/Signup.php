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
                'extendType' => 'customer_registration_type',
                'require' => 'no',
                'type' => 'string',
                'description' => '广告主类型',
                'restraint' => '见   [link href="customer_registration_type"]广告主类型定义[/link]',
                'errormsg' => '广告主类型不正确',
                'enum' => 'enum',
                'source' => 'api_customer_registration_type',
            );

            'product_type_set' => array(
                'name' => 'product_type_set',
                'extendType' => 'product_type_set',
                'require' => 'no',
                'type' => 'string',
                'description' => '推广方类型',
                'restraint' => '见   [link href="target_type"]推广方类型[/link]',
                'errormsg' => '推广方类型不正确',
                'list' => 'TARGETTYPE_OPEN_PLATFORM_APP,TARGETTYPE_BRAND',
                'enum' => 'enum',
                'source' => 'api_target_type',
            );

            'login_name' => array(
                'name' => 'login_name',
                'extendType' => 'login_name',
                'require' => 'no',
                'type' => 'integer',
                'description' => '登录名',
                'restraint' => '小于42亿',
                'errormsg' => '登录名不正确',
                'max' => '4294967295',
                'min' => '10000',
            );

            'advertiser_name' => array(
                'name' => 'advertiser_name',
                'extendType' => 'advertiser_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '广告主名称',
                'restraint' => '小于90个英文字符',
                'errormsg' => '广告主名称不正确',
                'max_length' => '90',
                'min_length' => '1',
            );

            'corporation_name' => array(
                'name' => 'corporation_name',
                'extendType' => 'corporation_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '公司名称',
                'restraint' => '小于120个英文字符',
                'errormsg' => '公司名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            );

            'certification_image_id' => array(
                'name' => 'certification_image_id',
                'extendType' => 'certification_image_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '营业执照/企业资质证明图片id',
                'restraint' => '小于32个英文字符',
                'errormsg' => '营业执照/企业资质证明图片id不正确',
                'max_length' => '32',
                'min_length' => '1',
            );

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
            );

            'qualification_image_id_list' => array(
                'name' => 'qualification_image_id_list',
                'extendType' => 'image_id_list',
                'require' => 'no',
                'type' => 'array',
                'description' => '广告特殊资质证明图片ID。最多不超过1
0个',
                'restraint' => 'URL小于255个英文字符',
                'errormsg' => '广告特殊资质证明图片ID不正确',
                'item_max_length' => '255',
            );

            'website' => array(
                'name' => 'website',
                'extendType' => 'website',
                'require' => 'no',
                'type' => 'string',
                'description' => '推广站点地址',
                'restraint' => 'URL小于255个英文字符',
                'errormsg' => '推广站点地址不正确',
                'max_length' => '255',
                'min_length' => '1',
                'pattern' => '{url_pattern}',
            );

            'site_name' => array(
                'name' => 'site_name',
                'extendType' => 'site_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '网站名称',
                'restraint' => '网站名称小于64个英文字符',
                'errormsg' => '网站名称不正确',
                'max_length' => '64',
                'min_length' => '1',
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
                'min_length' => '1',
            );

            'individual_qualification' => array(
                'name' => 'individual_qualification',
                'extendType' => 'individual_qualification',
                'require' => 'no',
                'type' => 'struct',
                'description' => '身份证明',
                'restraint' => '当 广告主组织类型为 CUSTOMER_REGISTIONTYPE_INDIVIDUAL时，需要提供身份证和个人半身照，结构如{"identification_image_id":"574656","photo_image_id":"77368"}',
                'errormsg' => '身份证明不正确',
                'element' => array(
                    'identification_image_id' => array(
                        'name' => 'identification_image_id',
                        'extendType' => 'identification_image_id',
                        'require' => 'yes',
                    ),
                    'photo_image_id' => array(
                        'name' => 'photo_image_id',
                        'extendType' => 'photo_image_id',
                        'require' => 'yes',
                    ),
                ),
            );

            'contact_person' => array(
                'name' => 'contact_person',
                'extendType' => 'contact_person',
                'require' => 'no',
                'type' => 'string',
                'description' => '联系人姓名',
                'restraint' => '联系人姓名小于32个英文字符',
                'errormsg' => '联系人姓名不正确',
                'max_length' => '32',
                'min_length' => '1',
            );

            'contact_person_email' => array(
                'name' => 'contact_person_email',
                'extendType' => 'contact_person_email',
                'require' => 'no',
                'type' => 'string',
                'description' => '联系人email',
                'restraint' => '联系人email小于255个英文字符',
                'errormsg' => '联系人email不正确',
                'max_length' => '255',
                'min_length' => '1',
                'pattern' => '/^\w+([\-\+\.]\w+)*@\w+([\-\.]\w+)*\.\w+([\-\.]\w+)*$/i',
            );

            'contact_person_mobile' => array(
                'name' => 'contact_person_mobile',
                'extendType' => 'contact_person_mobile',
                'require' => 'no',
                'type' => 'string',
                'description' => '联系人手机号码',
                'restraint' => '例如：+8613900000000 或 13900000000',
                'errormsg' => '联系人手机号码不正确',
                'max_length' => '20',
                'min_length' => '0',
                'pattern' => '/^\+?[0-9]{6,13}$/',
            );

            'contact_person_telephone' => array(
                'name' => 'contact_person_telephone',
                'extendType' => 'contact_person_telephone',
                'require' => 'no',
                'type' => 'string',
                'description' => '联系人座机电话号码',
                'restraint' => '例如：0755-86013388',
                'errormsg' => '联系人电话号码不正确',
                'max_length' => '20',
                'min_length' => '0',
                'pattern' => '/^[0-9]{3,4}\-[0-9]{6,8}(\-[0-9]{1,8})?$/',
            );

            'contact_person_qq' => array(
                'name' => 'contact_person_qq',
                'extendType' => 'contact_person_qq',
                'require' => 'no',
                'type' => 'integer',
                'description' => '联系人QQ',
                'restraint' => '小于42亿',
                'errormsg' => '联系人QQ不正确',
                'max' => '4294967295',
                'min' => '10000',
            );

            'address' => array(
                'name' => 'address',
                'extendType' => 'address',
                'require' => 'no',
                'type' => 'string',
                'description' => '联系地址',
                'restraint' => '联系地址小于255个英文字符',
                'errormsg' => '联系地址不正确',
                'max_length' => '255',
                'min_length' => '1',
            );

            'corporate_reg_no' => array(
                'name' => 'corporate_reg_no',
                'extendType' => 'corporate_reg_no',
                'require' => 'no',
                'type' => 'string',
                'description' => '企业营业执照注册号',
                'errormsg' => '企业营业执照注册号不正确',
                'max_length' => '18',
                'min_length' => '1',
                'pattern' => '/^[a-z0-9-]{1,18}$/i',
            );

            'legal_person_id' => array(
                'name' => 'legal_person_id',
                'extendType' => 'legal_person_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '身份证号码',
                'errormsg' => '身份证号码不正确',
                'max_length' => '18',
                'min_length' => '1',
                'pattern' => '/(^(\d{15}|\d{18}|\d{17}(x|X))$)/',
            );
;
    }

}

//end of script
