<?php 

namespace Spa\Object\Interfaces\TargetingRule;



/**
 * Class UpdateCustomAudience
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UpdateCustomAudience {

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
                'type' => 'integer',
                'description' => '广告主ID',
                'restraint' => '详见附录',
                'errormsg' => '广告主ID不正确',
                
                
                
                
                
                
                'max' => '4294967296',
                'min' => '0',
                'name' => 'advertiser_id',
            );

            'rule_id' => array(
                'name' => 'rule_id',
                'extendType' => 'rule_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '规则id',
                'restraint' => '规则id',
                'errormsg' => '规则id不正确',
                
                
                
                
                
                
                
                
                'name' => 'rule_id',
            );

            'rule_name' => array(
                'name' => 'rule_name',
                'extendType' => 'rule_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '规则名称',
                'restraint' => '不超过90个英文字符',
                'errormsg' => '规则名称不正确',
                'max_length' => '90',
                'min_length' => '1',
                
                
                
                
                
                
                'name' => 'rule_name',
            );

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
                
                
                
                
                
                
                'name' => 'description',
            );
;
    }

}

//end of script
