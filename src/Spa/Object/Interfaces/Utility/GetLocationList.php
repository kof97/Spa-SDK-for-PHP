<?php 

namespace Spa\Object\Interfaces\Utility;

use Spa\Object\Detector\FieldsDetector;

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

    /**
     * Init .
     */
    public function __construct($spa, $mod, $act) {
        $this->spa = $spa;

        $this->method = 'GET';

        $this->endpoint = $mod . '/' . $act;
    }

    /**
     * Send a request.
     *
     * @param array $params  The request params.
     * @param array $headers The request headers.
     * @return Response
     */
    public function send($params = array(), $headers = array()) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    /**
     * Send a request with the user's token.
     *
     * @param array $params       The request params.
     * @param array $headers      The request headers.
     * @param array $access_token The user's access token.
     * @return Response
     */
    public function sendWithAccessToken($params = array(), $headers = array(), $access_token = null) {
        $data = $this->fieldInfo();

        FieldsDetector::validateField($params, $data);

        $response = $this->spa->sendRequest($this->method, $this->endpoint, $params, $headers, $access_token);

        return $response;
    }

    /**
     * The fields info.
     */
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
