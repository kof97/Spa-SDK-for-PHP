<?php 

namespace Spa\Object\Interfaces\Adgroup;



/**
 * Class Count
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Count {

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

            'where' => array(
                'name' => 'where',
                'extendType' => 'where',
                'require' => 'no',
                'description' => '过滤条件',
                'restraint' => '若此字段不传，或传空则视为无限制条件。例{"status":"AD_STATUS_NORMAL"}, 可选过滤字段：status，adgroup_name。',
                'errormsg' => '过滤条件不正确',
                'name' => 'where',
                'name' => 'where',
            );

            'group_by' => array(
                'name' => 'group_by',
                'extendType' => 'group_by',
                'require' => 'yes',
                'description' => '聚合字段',
                'restraint' => '目前支持configured_status，system_status 例：["status, system_status"]',
                'errormsg' => '聚合字段不正确',
                'name' => 'group_by',
                'name' => 'group_by',
            );
;
    }

}

//end of script
