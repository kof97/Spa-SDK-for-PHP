<?php 

namespace Spa\Object\Interfaces\Report;



/**
 * Class SelectAgeAdvertiser
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectAgeAdvertiser {

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
                'type' => 'integer','description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                );

            'date_range' => array(
                'name' => 'date_range',
                'extendType' => 'date_range',
                'require' => 'yes',
                'type' => 'struct','description' => '时间范围',
                'restraint' => '日期格式，{"start_date":"2014-03-01","end_date":"2014-04-02"}',
                'errormsg' => '时间范围不正确',
                );

            'group_by' => array(
                'name' => 'group_by',
                'extendType' => 'group_by',
                'require' => 'no',
                'type' => 'array','description' => '聚合参数，例：["date"]',
                'restraint' => '见 [link href="group_by"]聚合规则定义[/link]',
                'errormsg' => '聚合字段不正确',
                );

            'page' => array(
                'name' => 'page',
                'extendType' => 'page',
                'require' => 'no',
                'type' => 'integer','description' => '搜索页码',
                'restraint' => '大于等于1，若不传则视为1',
                'errormsg' => '页码不正确',
                );

            'page_size' => array(
                'name' => 'page_size',
                'extendType' => 'page_size',
                'require' => 'no',
                'type' => 'integer','description' => '一页显示的数据条数',
                'restraint' => '大于等于1，且小于100，若不传则视为10',
                'errormsg' => '每页显示条数不正确',
                );

    }

}

//end of script
