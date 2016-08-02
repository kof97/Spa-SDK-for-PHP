<?php 

namespace Spa\Object\Interfaces\Targeting;

use Spa\Object\Detector\FieldsDetector;

/**
 * Class Create
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Create {

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

            'targeting_name' => array(
                'name' => 'targeting_name',
                'extendType' => 'targeting_name',
                'require' => 'yes',
                'type' => '',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => '',
            ),

            'ui_visibility' => array(
                'name' => 'ui_visibility',
                'extendType' => 'ui_visibility',
                'require' => 'no',
                'type' => '',
            ),

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'write_targeting_setting',
                'require' => 'no',
                'type' => '',
            ),

            'outer_targeting_id' => array(
                'name' => 'outer_targeting_id',
                'extendType' => 'outer_targeting_id',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
