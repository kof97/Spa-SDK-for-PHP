<?php 

namespace Spa\Object\Interfaces\OfflineReport;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class SelectHourly
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectHourly {

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

            'task' => array(
                'name' => 'task',
                'extendType' => 'task',
                'require' => 'yes',
                'type' => 'string',
                'description' => '任务',
                'restraint' => '例如：TASK_CLICKDETAILS,详见 [link href="task"]离线任务[/link]',
                'errormsg' => '任务不正确',
                'enum' => 'enum',
                'source' => 'api_task',
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

            'hour' => array(
                'name' => 'hour',
                'extendType' => 'hour',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '小时(0-23)',
                'restraint' => '1',
                'errormsg' => '小时不正确',
                'max' => '23',
                'min' => '0',
            ),

        );
    }

}

//end of script
