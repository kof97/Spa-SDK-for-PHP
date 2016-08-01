<?php 

namespace Spa\Object\Interfaces\TargetingRule;



/**
 * Class AuthorizationList
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class AuthorizationList {

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

        $this->method = 'GET';

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
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                'name' => 'advertiser_id',
                'name' => 'advertiser_id',
            );

            'filter' => array(
                'name' => 'filter',
                'extendType' => 'filter',
                'require' => 'no',
                'description' => '过滤条件',
                'restraint' => '若此字段不传，或传空则视为无限制条件。详见 [link href='filter']高级条件[/link]。支持字段: rule_id, to_advertiser_id',
                'errormsg' => '过滤条件不正确',
                'name' => 'filter',
                'name' => 'filter',
            );

            'page' => array(
                'name' => 'page',
                'extendType' => 'page',
                'require' => 'no',
                'description' => '搜索页码',
                'restraint' => '大于等于1，若不传则视为1',
                'errormsg' => '页码不正确',
                'name' => 'page',
                'name' => 'page',
            );

            'page_size' => array(
                'name' => 'page_size',
                'extendType' => 'page_size',
                'require' => 'no',
                'description' => '一页显示的数据条数',
                'restraint' => '大于等于1，且小于100，若不传则视为10',
                'errormsg' => '每页显示条数不正确',
                'name' => 'page_size',
                'name' => 'page_size',
            );
;
    }

}

//end of script
