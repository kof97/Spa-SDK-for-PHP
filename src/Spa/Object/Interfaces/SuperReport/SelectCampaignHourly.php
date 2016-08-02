<?php 

namespace Spa\Object\Interfaces\SuperReport;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class SelectCampaignHourly
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectCampaignHourly {

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

        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
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

            'date' => array(
                'name' => 'date',
                'extendType' => 'date',
                'require' => 'yes',
                'type' => 'string',
                'description' => '查询时间',
                'restraint' => '日期格式，如2014-03-01',
                'errormsg' => '查询时间不正确',
                'max_length' => '10',
                'min_length' => '10',
                'pattern' => '{date_pattern}',
            ),

            'filter' => array(
                'name' => 'filter',
                'extendType' => 'filter',
                'require' => 'no',
                'type' => 'array',
                'description' => '过滤条件',
                'restraint' => '若此字段不传，或传空则视为无限制条件。详见 [link href="filter"]高级条件[/link]。支持字段: adgroup_id,campaign_id,adgroup_name,status,start_date,end_date',
                'errormsg' => '过滤条件不正确',

                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'filter_struct',
                    'item_max_length' => '255',
                )
            ),

            'order_by' => array(
                'name' => 'order_by',
                'extendType' => 'order_by',
                'require' => 'no',
                'type' => 'struct',
                'description' => '排序参数,默认按日期降序',
                'restraint' => '见 [link href="order_by"]排序规则定义[/link]',
                'errormsg' => '排序参数不正确',
                        

                'element' => array(
                    'cpc' => array(
                        'name' => 'cpc',
                        'extendType' => 'cpc',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => 'cpc',
                        'restraint' => 'cpc',
                        'errormsg' => 'cpc不正确',
                        'enum' => 'enum',
                        'source' => 'api_Sortord',

                    ),
                    'cost' => array(
                        'name' => 'cost',
                        'extendType' => 'cost',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => 'cost',
                        'restraint' => 'cost',
                        'errormsg' => 'cost不正确',
                        'enum' => 'enum',
                        'source' => 'api_Sortord',

                    ),
                    'impression' => array(
                        'name' => 'impression',
                        'extendType' => 'impression',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => 'impression',
                        'restraint' => 'impression',
                        'errormsg' => 'impression不正确',
                        'enum' => 'enum',
                        'source' => 'api_Sortord',

                    ),
                ),
            ),

            'group_by' => array(
                'name' => 'group_by',
                'extendType' => 'group_by',
                'require' => 'no',
                'type' => 'array',
                'description' => '聚合参数',
                'restraint' => '见 [link href="group_by"]聚合规则定义[/link]',
                'errormsg' => '聚合参数不正确',

                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'item_max_length' => '255',
                )
            ),

            'page' => array(
                'name' => 'page',
                'extendType' => 'page',
                'require' => 'no',
                'type' => 'integer',
                'description' => '搜索页码',
                'restraint' => '大于等于1，若不传则视为1',
                'errormsg' => '页码不正确',
                'max' => '99999',
                'min' => '1',
            ),

            'page_size' => array(
                'name' => 'page_size',
                'extendType' => 'page_size',
                'require' => 'no',
                'type' => 'integer',
                'description' => '一页显示的数据条数',
                'restraint' => '大于等于1，且小于100，若不传则视为10',
                'errormsg' => '每页显示条数不正确',
                'max' => '100',
                'min' => '1',
            ),

        );
    }

}

//end of script
