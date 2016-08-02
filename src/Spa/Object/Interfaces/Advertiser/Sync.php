<?php 

namespace Spa\Object\Interfaces\Advertiser;

use Spa\Exceptions\ParamsException;

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

        $this->validateField($params);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }

        $data = $this->fieldInfo();

        // validate the required field
        $this->validateRequireField($data, $params);

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

            $type = $data[$key]['type'];
            switch ($type) {
                case 'string':
                    $this->validateString($data[$key], $value);
                    break;

                case 'integer':
                    
                    break;

                case 'id':

                case 'number':
                    
                    break;

                case 'struct':
                    
                    break;

                case 'array':
                    
                    break;

                default: break;
            }
        }
    }

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                throw new ParamsException("Expect the required params '$key' that you didn't provide");
            }
        }
    }

    protected function validateString($data, $value) {

    }

    public function fieldInfo() {
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

            'outer_advertiser_id' => array(
                'name' => 'outer_advertiser_id',
                'extendType' => 'outer_advertiser_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告主Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告主Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'corporation_name' => array(
                'name' => 'corporation_name',
                'extendType' => 'corporation_name',
                'require' => 'yes',
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
                'require' => 'yes',
                'type' => 'integer',
                'description' => '最细一级行业分类（最细有3级）',
                'restraint' => '详见 [link href="industry_id"]新行业分类[/link]',
                'errormsg' => '行业分类不正确',
                'max' => '1000000000000',
                'min' => '0',
            ),

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'sync_daily_budget',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '日限额，单位为分',
                'restraint' => '0 – 1000000000，0表示不限，单位为分',
                'errormsg' => '日消耗限额不正确',
                'max' => '1000000000',
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
                'require' => 'yes',
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
                'require' => 'yes',
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

            'outer_extend_info' => array(
                'name' => 'outer_extend_info',
                'extendType' => 'outer_extend_info',
                'require' => 'yes',
                'type' => 'struct',
                'description' => '广告主扩展信息',
                'restraint' => '详见 [link href="outer_extend_info"]广告主扩展信息[/link]',
                'errormsg' => '广告主扩展信息不正确',
                'element' => array(
                    'id' => array(
                        'name' => 'id',
                        'extendType' => 'outer_extend_info_id',
                        'require' => 'no',
                    ),
                    'name' => array(
                        'name' => 'name',
                        'extendType' => 'outer_extend_info_name',
                        'require' => 'no',
                    ),
                    'category_id' => array(
                        'name' => 'category_id',
                        'extendType' => 'outer_extend_info_category_id',
                        'require' => 'no',
                    ),
                    'category_name' => array(
                        'name' => 'category_name',
                        'extendType' => 'outer_extend_info_category_name',
                        'require' => 'no',
                    ),
                ),
            ),

            'outer_version' => array(
                'name' => 'outer_version',
                'extendType' => 'outer_version',
                'require' => 'no',
                'type' => 'integer',
                'description' => '调用方数据版本',
                'restraint' => '大于等于0，小于等于2^63',
                'errormsg' => '调用方数据版本不正确',
            ),

        );
    }

}

//end of script
