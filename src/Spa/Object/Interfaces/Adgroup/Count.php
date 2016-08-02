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
            var_dump($key);
            var_dump($value);
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

            'where' => array(
                'name' => 'where',
                'extendType' => 'where',
                'require' => 'no',
                'type' => 'struct',
                'description' => '过滤条件',
                'restraint' => '若此字段不传，或传空则视为无限制条件。例{"status":"AD_STATUS_NORMAL"}, 可选过滤字段：status，adgroup_name。',
                'errormsg' => '过滤条件不正确',
                'element' => array(
                    'configured_status' => array(
                        'name' => 'configured_status',
                        'extendType' => 'configured_status',
                        'require' => 'no',
                    ),
                    'system_status' => array(
                        'name' => 'system_status',
                        'extendType' => 'system_status',
                        'require' => 'no',
                    ),
                    'adgroup_name' => array(
                        'name' => 'adgroup_name',
                        'extendType' => 'adgroup_name',
                        'require' => 'no',
                    ),
                ),
            ),

            'group_by' => array(
                'name' => 'group_by',
                'extendType' => 'group_by',
                'require' => 'yes',
                'type' => 'array',
                'description' => '聚合字段',
                'restraint' => '目前支持configured_status，system_status 例：["status, system_status"]',
                'errormsg' => '聚合字段不正确',
                'list' => 'configured_status,system_status',
                    

                'item_max_length' => '255',
                'repeated' => array(
                    'type' => 'string',
                    'list' => 'configured_status,system_status',
                    'item_max_length' => '255',
                )
            ),

        );
    }

}

//end of script
