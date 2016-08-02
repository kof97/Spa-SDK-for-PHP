<?php 

namespace Spa\Object\Interfaces\Utility;



/**
 * Class GetCreativeTemplateRefs
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class GetCreativeTemplateRefs {

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

        $response = $spa->sendRequest($this->method, $this->endpoint, $params, $headers);

        return $response;
    }

    protected function validateField($params) {
        if (empty($params)) {
            return;
        }


        $data = $this->fieldInfo();

        foreach ($params as $key => $value) {
            

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

    public function fieldInfo() {
        return array(

            'creative_template_id' => array(
                'name' => 'creative_template_id',
                'extendType' => 'creative_template_id',
                'require' => 'no',
                'type' => 'integer',
                'description' => '素材规格Id',
                'restraint' => '详见 [link href="creative_template_id"]素材规格Id[/link]',
                'errormsg' => '素材规格Id不正确',
            ),

        );
    }

}

//end of script
