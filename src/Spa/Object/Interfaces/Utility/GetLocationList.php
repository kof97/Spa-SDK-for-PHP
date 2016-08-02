<?php 

namespace Spa\Object\Interfaces\Utility;



/**
 * Class GetLocationList
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetLocationList {

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

    protected function validateRequireField($data, $params) {
        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                throw new Exception("Expect the required params '$key' that you didn't provide");
                
            }
        }
    }

    public function fieldInfo() {
        return array(

            'region_id' => array(
                'name' => 'region_id',
                'extendType' => 'region_id',
                'require' => 'yes',
                'type' => 'integer',
                'description' => '城市ID',
                'restraint' => '城市ID是六位的数字',
                'errormsg' => '城市ID不正确',
                'max' => '999999',
                'min' => '0',
            ),

        );
    }

}

//end of script
