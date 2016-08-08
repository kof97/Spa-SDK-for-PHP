<?php 

namespace Spa\Object\Interfaces\TargetingAudience;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Select
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Select {

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

        $this->method = 'GET';

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

            'audience_type' => array(
                'name' => 'audience_type',
                'extendType' => 'audience_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '人群类型，如：Meta、Combine、Lookalike',
                'restraint' => '详见 [link href="audience_type"]人群类型[/link]',
                'errormsg' => '人群类型不正确',
                'enum' => 'enum',
                'source' => 'api_audience_type',
            ),

            'filter' => array(
                'name' => 'filter',
                'extendType' => 'filter',
                'require' => 'no',
                'type' => 'array',
                'description' => '若此字段不传，或传空则视为无限制条件。参见：高级条件',
                'restraint' => '过滤条件结构',
                'errormsg' => '过滤条件不正确',
                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'filter_struct',
                    'name' => 'filter_struct',
                    'item_max_length' => '255',
                    'element' => array(
                        'field' => array(
                            'name' => 'field',
                            'extendType' => 'field',
                            'require' => 'yes',
                            'type' => 'string',
                            'description' => '字段',
                            'restraint' => '字段',
                            'errormsg' => '字段不正确',
                            'max_length' => '32',
                            'min_length' => '1',
                            'list' => 'status,audience_name,audience_id,parent_audience_id,file_name',
                        ),
    
                        'operator' => array(
                            'name' => 'operator',
                            'extendType' => 'operator',
                            'require' => 'yes',
                            'type' => 'string',
                            'description' => '操作符',
                            'restraint' => '操作符',
                            'errormsg' => '操作符不正确',
                            'enum' => 'enum',
                            'source' => 'api_filter_operator',
                        ),
    
                        'value' => array(
                            'name' => 'value',
                            'extendType' => 'value',
                            'require' => 'yes',
                            'type' => 'string',
                            'description' => '字段取值',
                            'restraint' => '字段取值',
                            'errormsg' => '字段取值不正确',
                            'max_length' => '32',
                            'min_length' => '1',
                        ),
    
                    ),
                )
            ),

            'order_by' => array(
                'name' => 'order_by',
                'extendType' => 'order_by',
                'require' => 'no',
                'type' => 'struct',
                'description' => '排序规则',
                'restraint' => '当前支持根据audience_id或user_count排序',
                'errormsg' => '排序参数不正确',
                'element' => array(
                    'audience_id' => array(
                        'name' => 'audience_id',
                        'extendType' => 'audience_id_order_by',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => 'audience_id_order_by',
                        'restraint' => 'audience_id_order_by',
                        'errormsg' => 'audience_id_order_by不正确',
                        'list' => 'ASCENDING,DESCENDING',
                        'enum' => 'enum',
                        'source' => 'api_Sortord',
                    ),

                    'user_count' => array(
                        'name' => 'user_count',
                        'extendType' => 'user_count_order_by',
                        'require' => 'no',
                        'type' => 'string',
                        'description' => 'user_count_order_by',
                        'restraint' => 'user_count_order_by',
                        'errormsg' => 'user_count_order_by不正确',
                        'list' => 'ASCENDING,DESCENDING',
                        'enum' => 'enum',
                        'source' => 'api_Sortord',
                    ),

                ),
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
