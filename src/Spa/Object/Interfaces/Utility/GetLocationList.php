<?php 

namespace Spa\Object\Interfaces\Utility;

use Spa\Exceptions\ParamsException;

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
                throw new ParamsException("The length of field '$key' is too long, it expects the length can't more than '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("The length of field '$key' is too short, it expects the length at least '$min_length'");
            }
        }

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("The value of field '$key' is limited in '$list'");
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
