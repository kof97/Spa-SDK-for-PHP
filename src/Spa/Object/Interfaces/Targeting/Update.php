<?php 

namespace Spa\Object\Interfaces\Targeting;



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

            'targeting_id' => array(
                'name' => 'targeting_id',
                'extendType' => 'targeting_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '定向Id不正确',
                
                
                
                
                
                
                'max' => '9223372036854775807',
                'min' => '1',
                'name' => 'targeting_id',
            );

            'targeting_name' => array(
                'name' => 'targeting_name',
                'extendType' => 'targeting_name',
                'require' => 'no',
                'type' => 'string',
                'description' => '定向名称',
                'restraint' => '小于等于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '定向名称不正确',
                'max_length' => '120',
                'min_length' => '1',
                
                
                
                
                
                
                'name' => 'targeting_name',
            );

            'description' => array(
                'name' => 'description',
                'extendType' => 'description',
                'require' => 'no',
                'type' => 'string',
                'description' => '定向描述',
                'restraint' => '小于250个英文字符',
                'errormsg' => '定向描述不正确',
                'max_length' => '250',
                'min_length' => '0',
                
                
                
                
                
                
                'name' => 'description',
            );

            'targeting_setting' => array(
                'name' => 'targeting_setting',
                'extendType' => 'write_targeting_setting',
                'require' => 'no',
                'type' => 'struct',
                'description' => '定向详细设置',
                'restraint' => '存放所有定向条件',
                'errormsg' => '定向详细设置不正确',
                
                
                
                
                
                
                
                
                'name' => 'targeting_setting',
            );
;
    }

}

//end of script
