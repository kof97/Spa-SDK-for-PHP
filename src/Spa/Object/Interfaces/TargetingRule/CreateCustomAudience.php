<?php 

namespace Spa\Object\Interfaces\TargetingRule;

use Spa\Exceptions\ParamsException;

/**
 * Class CreateCustomAudience
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class CreateCustomAudience {

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
                throw new ParamsException("The field '$key' expect the max length is '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("The field '$key' expect the min length is '$min_length'");
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

            'rule_name' => array(
                'name' => 'rule_name',
                'extendType' => 'rule_name',
                'require' => 'yes',
                'type' => 'string',
                'description' => '规则名称',
                'restraint' => '不超过90个英文字符',
                'errormsg' => '规则名称不正确',
                'max_length' => '90',
                'min_length' => '1',
            ),

            'rule_type' => array(
                'name' => 'rule_type',
                'extendType' => 'rule_type',
                'require' => 'yes',
                'type' => 'string',
                'description' => '号码类型',
                'restraint' => '详见 [link href="custom_audience_rule_type"]号码类型列表[/link]',
                'errormsg' => '号码类型不正确',
                'enum' => 'enum',
                'source' => 'api_custom_audience_rule_type',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => 'string',
                'description' => '受众描述',
                'restraint' => '不超过250个英文字符',
                'errormsg' => '受众描述不正确',
                'max_length' => '250',
                'min_length' => '0',
            ),

        );
    }

}

//end of script
