<?php 

namespace Spa\Object\Interfaces\Product;

use Spa\Object\Detector\FieldsDetector;

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

    /**
     * Init .
     */
    public function __construct($spa, $mod, $act) {
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
    public function send($params = array(), $headers = array()) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    /**
     * Send a request with the user's token.
     *
     * @param array $params       The request params.
     * @param array $headers      The request headers.
     * @param array $access_token The user's access token.
     * @return Response
     */
    public function sendWithAccessToken($params = array(), $headers = array(), $access_token = null) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

        return $response;
    }

    /**
     * The fields info.
     */
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

            'product_refs_id' => array(
                'name' => 'product_refs_id',
                'extendType' => 'product_refs_id',
                'require' => 'yes',
                'type' => 'string',
                'description' => '标的物Id',
                'restraint' => '小于128个英文字符',
                'errormsg' => '标的物Id不正确',
                'max_length' => '128',
                'min_length' => '0',
            ),

            'product_name' => array(
                'name' => 'product_name',
                'extendType' => 'product_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '标的物名称',
                'restraint' => '小于255个英文字符',
                'errormsg' => '标的物名称不正确',
                'max_length' => '255',
                'min_length' => '1',
            ),

            'product_type' => array(
                'name' => 'product_type',
                'extendType' => 'product_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '标的物类型',
                'restraint' => '详见 [link href="product_type"]标的物类型[/link]',
                'errormsg' => '标的物类型不正确',
                'list' => 'PRODUCT_TYPE_APP_ANDROID_OPEN_PLATFORM,PRODUCT_TYPE_APP_IOS,PRODUCT_TYPE_QZONE_PAGE_INDEX,PRODUCT_TYPE_QZONE_PAGE_ARTICLE,PRODUCT_TYPE_QZONE_PAGE_IFRAMED',
                'enum' => 'enum',
                'source' => 'api_product_type',
            ),

            'product_info' => array(
                'name' => 'product_info',
                'extendType' => 'product_info',
                'require' => 'no',
                'type' => 'struct',
                'description' => '标的物详细信息',
                'restraint' => '详见 [link href="ec_info"]京东、拍拍店铺、标的物[/link]',
                'errormsg' => '京东购物行为不正确',
                'element' => array(
                    'product_type_jd_item' => array(
                        'name' => 'product_type_jd_item',
                        'extendType' => 'ec_info',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '电商标的物信息',
                        'restraint' => '详见 [link href="ec_info"]京东、拍拍涉及标的物[/link]',
                        'element' => array(
                            'product_price' => array(
                                'name' => 'product_price',
                                'extendType' => 'product_price',
                                'require' => 'yes',
                                'type' => 'integer',
                                'description' => '标的物对应出价',
                                'restraint' => '大于等于0，且小于9223372036854775807，单位为分',
                                'errormsg' => '标的物出价错误',
                            ),
        
                            'product_meta_class' => array(
                                'name' => 'product_meta_class',
                                'extendType' => 'product_meta_class',
                                'require' => 'yes',
                                'type' => 'integer',
                                'description' => '标的物的原始类目',
                                'restraint' => '大于等于0，且小于9223372036854775807',
                            ),
        
                        ),
                    ),

                    'product_type_jd_shop' => array(
                        'name' => 'product_type_jd_shop',
                        'extendType' => 'ec_info',
                        'require' => 'no',
                        'type' => 'struct',
                        'description' => '电商标的物信息',
                        'restraint' => '详见 [link href="ec_info"]京东、拍拍涉及标的物[/link]',
                        'element' => array(
                            'product_price' => array(
                                'name' => 'product_price',
                                'extendType' => 'product_price',
                                'require' => 'yes',
                                'type' => 'integer',
                                'description' => '标的物对应出价',
                                'restraint' => '大于等于0，且小于9223372036854775807，单位为分',
                                'errormsg' => '标的物出价错误',
                            ),
        
                            'product_meta_class' => array(
                                'name' => 'product_meta_class',
                                'extendType' => 'product_meta_class',
                                'require' => 'yes',
                                'type' => 'integer',
                                'description' => '标的物的原始类目',
                                'restraint' => '大于等于0，且小于9223372036854775807',
                            ),
        
                        ),
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
