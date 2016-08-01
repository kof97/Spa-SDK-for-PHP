<?php 

namespace Spa\Object\Interfaces\OfflineReport;



/**
 * Class SelectDaily
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class SelectDaily {

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

            'task' => array(
                'name' => 'task',
                'extendType' => 'task',
                'require' => 'yes',
                'description' => '任务',
                'restraint' => '例如：TASK_CLICKDETAILS,详见 [link href='task']离线任务[/link]',
                'errormsg' => '任务不正确',
                'name' => 'task',
                'name' => 'task',
            );

            'date' => array(
                'name' => 'date',
                'extendType' => 'date',
                'require' => 'yes',
                'description' => '查询时间',
                'restraint' => '日期格式，如2014-03-01',
                'errormsg' => '查询时间不正确',
                'name' => 'date',
                'name' => 'date',
            );
;
    }

}

//end of script
