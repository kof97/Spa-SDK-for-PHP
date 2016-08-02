<?php 

namespace Spa\Object\Interfaces\\$mod_class;

use Spa\Exceptions\ParamsException;

/**
 * Class $interface_class
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class $interface_class {

    /**
     * Instance of Spa.
     */
    protected \$spa;

    /**
     * HTTP method.
     */
    protected \$method;

    /**
     * The request endpoint.
     */
    protected \$endpoint;

    protected \$name;

    protected \$title;


    /**
     * Init .
     */
    public function __construct(\$spa, \$mod, \$act) {

        \$this->spa = \$spa;

        \$this->method = '$method';

        \$this->endpoint = \$mod . '/' . \$act;

    }

    public function send(\$params = array(), \$headers = array()) {

        \$this->validateField(\$params);

        \$response = \$this->spa->sendRequest(\$this->method, \$this->endpoint, \$params, \$headers);

        return \$response;
    }

    protected function validateField(\$params) {
        if (empty(\$params)) {
            return;
        }

        \$data = \$this->fieldInfo();

        // validate the required field
        \$this->validateRequireField(\$data, \$params);

        foreach (\$params as \$key => \$value) {
            if (!isset(\$data[\$key])) {
                continue;
            }

            \$type = \$data[\$key]['type'];
            switch (\$type) {
                case 'string':
                    \$this->validateString(\$data[\$key], \$value);
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

    protected function validateRequireField(\$data, \$params) {
        foreach (\$data as \$key => \$value) {
            if (\$value['require'] === 'no') {
                continue;
            }

            if (!isset(\$params[\$key])) {
                throw new ParamsException("Expect the required params '\$key' that you didn't provide");
            }
        }
    }

    protected function validateString(\$data, \$value) {

    }

    public function fieldInfo() {
        return $field_info
    }

}

//end of script
