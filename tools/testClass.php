<?php 

namespace Tsa\Object\Interfaces\\$mod_class;

use Tsa\Object\Detector\FieldsDetector;

/**
 * Class $interface_class
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class $interface_class
{
    /**
     * Instance of Tsa.
     */
    protected \$tsa;

    /**
     * HTTP method.
     */
    protected \$method;

    /**
     * The request endpoint.
     */
    protected \$endpoint;

    /**
     * Init .
     */
    public function __construct(\$tsa, \$mod, \$act)
    {
        \$this->tsa = \$tsa;

        \$this->method = '$method';

        \$this->endpoint = \$mod . '/' . \$act;
    }

    /**
     * Send a request.
     *
     * @param array \$params  The request params.
     * @param array \$headers The request headers.
     * @return Response
     */
    public function send(\$params = array(), \$headers = array())
    {
        \$data = \$this->fieldInfo();

        FieldsDetector::validateField(\$params, \$data);

        \$response = \$this->tsa->sendRequest(\$this->method, \$this->endpoint, \$params, \$headers);

        return \$response;
    }

    /**
     * Send a request with the user's token.
     *
     * @param array \$params       The request params.
     * @param array \$headers      The request headers.
     * @param array \$access_token The user's access token.
     * @return Response
     */
    public function sendWithAccessToken(\$params = array(), \$headers = array(), \$access_token = null)
    {
        \$data = \$this->fieldInfo();

        FieldsDetector::validateField(\$params, \$data);

        \$response = \$this->tsa->sendRequest(\$this->method, \$this->endpoint, \$params, \$headers, \$access_token);

        return \$response;
    }

    /**
     * The fields info.
     */
    public function fieldInfo()
    {
        return $field_info
    }

}

//end of script
