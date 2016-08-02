<?php 

namespace Spa\Object\Interfaces\TargetingRule;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Authorize
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Authorize {

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

            'operation_type' => array(
                'name' => 'operation_type',
                'extendType' => 'operation_type',
                'require' => 'yes',
                'type' => '',
            ),

            'rule_id' => array(
                'name' => 'rule_id',
                'extendType' => 'rule_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '规则id',
                'restraint' => '规则id',
                'errormsg' => '规则id不正确',
            ),

            'to_advertiser_id' => array(
                'name' => 'to_advertiser_id',
                'extendType' => 'to_advertiser_id',
                'require' => 'yes',
                'type' => '',
            ),

            'to_rule_id' => array(
                'name' => 'to_rule_id',
                'extendType' => 'to_rule_id',
                'require' => 'no',
                'type' => '',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
