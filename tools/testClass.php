<?php 

namespace Spa\Object\Interfaces\\$mod_class;

use Spa\Object\Detector\FieldsDetector;

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

        \$data = \$this->fieldInfo();

        FieldsDetector::validateField(\$params, \$data);

        \$response = \$this->spa->sendRequest(\$this->method, \$this->endpoint, \$params, \$headers);

        return \$response;
    }

    public function fieldInfo() {
        return $field_info
    }

}

//end of script
