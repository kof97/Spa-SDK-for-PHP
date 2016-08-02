<?php 

namespace Spa\Object\Interfaces\TargetingAudience;

use Spa\Exceptions\ParamsException;
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

            'audience_name' => array(
                'name' => 'audience_name',
                'extendType' => 'audience_name',
                'require' => 'yes',
                'type' => '',
            ),

            'audience_type' => array(
                'name' => 'audience_type',
                'extendType' => 'audience_type',
                'require' => 'yes',
                'type' => '',
            ),

            'parent_audience_id' => array(
                'name' => 'parent_audience_id',
                'extendType' => 'audience_id',
                'require' => 'no',
                'type' => '',
            ),

            'data_type' => array(
                'name' => 'data_type',
                'extendType' => 'data_type',
                'require' => 'no',
                'type' => '',
            ),

            'data_file' => array(
                'name' => 'data_file',
                'extendType' => 'data_file',
                'require' => 'no',
                'type' => '',
            ),

            'file_name' => array(
                'name' => 'file_name',
                'extendType' => 'file_name',
                'require' => 'no',
                'type' => '',
            ),

            'file_md5' => array(
                'name' => 'file_md5',
                'extendType' => 'file_md5',
                'require' => 'no',
                'type' => '',
            ),

            'combine_rule' => array(
                'name' => 'combine_rule',
                'extendType' => 'combine_rule',
                'require' => 'no',
                'type' => '',
            ),

            'seed_audience_type' => array(
                'name' => 'seed_audience_type',
                'extendType' => 'audience_type',
                'require' => 'no',
                'type' => '',
            ),

            'seed_audience_id' => array(
                'name' => 'seed_audience_id',
                'extendType' => 'audience_id',
                'require' => 'no',
                'type' => '',
            ),

            'magnification' => array(
                'name' => 'magnification',
                'extendType' => 'magnification',
                'require' => 'no',
                'type' => '',
            ),

            'combine_rule' => array(
                'name' => 'combine_rule',
                'extendType' => 'combine_rule',
                'require' => 'no',
                'type' => '',
            ),

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => '',
            ),

            'refs_app_id' => array(
                'name' => 'refs_app_id',
                'extendType' => 'refs_app_id',
                'require' => 'no',
                'type' => '',
            ),

            'outer_audience_id' => array(
                'name' => 'outer_audience_id',
                'extendType' => 'outer_audience_id',
                'require' => 'no',
                'type' => '',
            ),

        );
    }

}

//end of script
