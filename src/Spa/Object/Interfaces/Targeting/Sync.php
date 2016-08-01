<?php 

namespace Spa\Object\Interfaces\Targeting;



/**
 * Class Sync
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Sync {

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
                'require' => 'yes',
                'type' => 'string',
                'description' => '定向名称',
                'restraint' => '小于等于120个英文字符，同一账户下名称不允许重复。',
                'errormsg' => '定向名称不正确',
                'max_length' => '120',
                'min_length' => '1',
                'name' => 'targeting_name',
            );

            'ui_visibility' => array(
                'name' => 'ui_visibility',
                'extendType' => 'ui_visibility',
                'require' => 'no',
                'type' => 'string',
                'description' => '定向包类型',
                'restraint' => '详见 [link href="ui_visibility"]定向包类型[/link]',
                'errormsg' => '定向包类型不正确',
                'enum' => 'enum',
                'source' => 'api_u_i_visibility',
                'name' => 'ui_visibility',
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

            'configured_status' => array(
                'name' => 'configured_status',
                'extendType' => 'targeting_status',
                'require' => 'yes',
                'type' => 'string',
                'description' => '定向状态',
                'restraint' => '可选值：AD_STATUS_NORMAL, AD_STATUS_DELETED',
                'errormsg' => '定向状态不正确',
                'list' => 'AD_STATUS_NORMAL,AD_STATUS_DELETED',
                'enum' => 'enum',
                'source' => 'api_sync_configured_status',
                'name' => 'configured_status',
            );

            'outer_targeting_id' => array(
                'name' => 'outer_targeting_id',
                'extendType' => 'outer_targeting_id',
                'require' => 'no',
                'type' => 'id',
                'description' => '外部广告定向Id',
                'restraint' => '小于2^63',
                'errormsg' => '外部广告定向Id不正确',
                'max' => '9223372036854775807',
                'min' => '1',
                'name' => 'outer_targeting_id',
            );

            'outer_version' => array(
                'name' => 'outer_version',
                'extendType' => 'outer_version',
                'require' => 'no',
                'type' => 'integer',
                'description' => '调用方数据版本',
                'restraint' => '大于等于0，小于等于2^63',
                'errormsg' => '调用方数据版本不正确',
                'name' => 'outer_version',
            );
;
    }

}

//end of script
