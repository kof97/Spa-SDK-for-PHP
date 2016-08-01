<?php 

namespace Spa\Object\Interfaces\Media;



/**
 * Class Read
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Read {

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

            'media_id' => array(
                'name' => 'media_id',
                'extendType' => 'media_id',
                'require' => 'yes',
                'type' => 'id',
                'description' => '媒体Id',
                'restraint' => '小于2^63',
                'errormsg' => '媒体Id不正确',
                
                
                
                'name' => 'media_id',
            );
;
    }

}

//end of script
