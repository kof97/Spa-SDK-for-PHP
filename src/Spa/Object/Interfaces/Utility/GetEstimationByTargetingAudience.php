<?php 

namespace Spa\Object\Interfaces\Utility;



/**
 * Class GetEstimationByTargetingAudience
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetEstimationByTargetingAudience {

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
                
                
                
                'name' => 'advertiser_id',
            );

            'combine_rule' => array(
                'name' => 'combine_rule',
                'extendType' => 'targeting_audience.combine_rule',
                'require' => 'yes',
                'type' => '',
                
                
                
                
                
                
                'name' => 'combine_rule',
            );
;
    }

}

//end of script
