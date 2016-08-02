<?php 

namespace Spa\Object\Interfaces\Product;

use Spa\Exceptions\ParamsException;

/**
 * Class Update
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Update {

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
                'require' => 'no',
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
                    ),
                    'product_type_jd_shop' => array(
                        'name' => 'product_type_jd_shop',
                        'extendType' => 'ec_info',
                        'require' => 'no',
                    ),
                ),
            ),

        );
    }

}

//end of script
