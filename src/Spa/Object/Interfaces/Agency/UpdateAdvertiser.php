<?php 

namespace Spa\Object\Interfaces\Agency;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class UpdateAdvertiser
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateAdvertiser
{
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

    /**
     * Init .
     */
    public function __construct($spa, $mod, $act)
    {

        $this->spa = $spa;

        $this->method = 'POST';

        $this->endpoint = $mod . '/' . $act;

    }

    /**
     * Send a request.
     *
     * @param array $params  The request params.
     * @param array $headers The request headers.
     * @return Response
     */
    public function send($params = array(), $headers = array())
    {

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    /**
     * The fields info.
     */
    public function fieldInfo()
    {
        return array(

            'advertiser_id' => array(
                'name' => 'advertiser_id',
                'extendType' => 'advertiser_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'max' => '4294967296',
                'min' => '0',
            ),

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
            ),

            'certification_image_id' => array(
                'name' => 'certification_image_id',
                'extendType' => 'image_id',
                'require' => 'no',
                'type' => 'string',
                'description' => '图片签名，目前使用图片的md5值',
                'restraint' => '32字符',
                'errormsg' => '图片签名不正确',
                'max_length' => '64',
                'min_length' => '1',
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
                'type' => 'array',
                'description' => '广告特殊资质证明图片ID。最多不超过1
0个',
                'restraint' => 'URL小于255个英文字符',
                'errormsg' => '广告特殊资质证明图片ID不正确',
                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'item_max_length' => '255',
                )
            ),

            'ad_qualification_image_id_list' => array(
                'name' => 'ad_qualification_image_id_list',
                'extendType' => 'image_id_list',
                'require' => 'no',
                'type' => 'array',
                'description' => '广告特殊资质证明图片ID。最多不超过1
0个',
                'restraint' => 'URL小于255个英文字符',
                'errormsg' => '广告特殊资质证明图片ID不正确',
                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'item_max_length' => '255',
                )
            ),

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

            'corporation_image_name' => array(
                'name' => 'corporation_image_name',
                'extendType' => 'corporation_image_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '品牌名称',
                'restraint' => '小于120个英文字符',
                'errormsg' => '品牌名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

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
            ),

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
            ),

        );
    }

}

//end of script
