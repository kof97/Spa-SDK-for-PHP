<?php 

namespace Spa\Object\Interfaces\Campaign;

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
                    $this->validateString($data[$key], $key, $value);
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

    protected function validateString($data, $key, $value) {
        $len = strlen($value);
        if (isset($data['max_length'])) {
            if ($len > ($max_length = $data['max_length'])) {
                throw new ParamsException("The length of field '$key' is too long, it expects the length can't more than '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("The length of field '$key' is too short, it expects the length at least '$min_length'");
            }
        }

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("The value of field '$key' is limited in '$list'");
            }
        }

        if (isset($data['pattern'])) {
            $pattern = $data['pattern'];
            
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

            'campaign_id' => array(
                'name' => 'campaign_id',
                'extendType' => 'campaign_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '推广计划Id',
                'restraint' => '小于2^63',
                'errormsg' => '推广计划Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
            ),

            'campaign_name' => array(
                'name' => 'campaign_name',
                'extendType' => 'campaign_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '推广计划名称',
                'restraint' => '小于120个英文字符，不可与名下其他推广计划重名',
                'errormsg' => '推广计划名称不正确',
                'max_length' => '120',
                'min_length' => '1',
            ),

            'daily_budget' => array(
                'name' => 'daily_budget',
                'extendType' => 'daily_budget',
                'require' => 'no',
                'type' => '',
            ),

            'total_budget' => array(
                'name' => 'total_budget',
                'extendType' => 'total_budget',
                'require' => 'no',
                'type' => '',
            ),

            'speed_mode' => array(
                'name' => 'speed_mode',
                'extendType' => 'speed_mode',
                'require' => 'no',
                'type' => '',
            ),

            'retainability_in_feeds' => array(
                'name' => 'retainability_in_feeds',
                'extendType' => 'retainability_in_feeds',
                'require' => 'no',
                'type' => '',
            ),

            'max_impression_include' => array(
                'name' => 'max_impression_include',
                'extendType' => 'max_impression_include',
                'require' => 'no',
                'type' => '',
            ),

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'configured_status',
                'require' => 'no',
                'type' => 'string',
                'description' => '用户状态',
                'errormsg' => '用户状态不正确',
                'enum' => 'enum',
                'source' => 'api_configured_status',
            ),

        );
    }

}

//end of script
