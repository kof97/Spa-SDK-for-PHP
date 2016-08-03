<?php

$idl = simplexml_load_file('luna.idl.xml');

getModulesEnumData($idl);

/**
 * 枚举类
 *
 */
function creatEnum($mod_class, $interface_class, $interface) {
    $enum_class_name = $interface_class . 'Enum';
    $items = '';
    $construct = '';

    foreach ($interface as $key => $value) {
        if ($key === 'request') {
            foreach ($value as $k => $v) {
                $enum = $v->attributes()['name'] . '';
                $enmu_name = strtoupper($enum);

                $items .= "
    /**
     * @const $enum 
     */
    const $enmu_name = '$enum';
";
                $construct = "
    /**
     * Init $enum.
     */
    public function __construct() {
    
    }
";
            }
        }
        
    }
    
    $content = <<<EOF
<?php 

namespace Spa\Object\Enum\\$mod_class;

/**
 * Class $enum_class_name
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class $enum_class_name {
    $items
    $construct
}

//end of script

EOF;

    $file_path = '../src/Spa/Object/Enum/' . $mod_class . '/' . $enum_class_name . '.php';

    //mkdir('../src/Spa/Object/Enum/' . $mod_class);

    $file = fopen($file_path, "w") or die("Unable to open file!");
    fwrite($file, $content);
    fclose($file);

}

/**
 * 生成模块的主类，用来选择各模块
 *
 */
function getModulesEnumData($data) {
    $modules_content = '
    /**
     * Instance of Spa.
     */
    protected $spa;';

    $modules_namespace_use = '';

    $construct = '
    /**
     * Init .
     */
    public function __construct($spa) {
        $this->spa = $spa;
    }';

    $get = '
    public function __get($mod) {
        switch ($mod) {';

    foreach ($data->children()->children() as $child) {
        if ($child->getName() === 'service') {
            foreach ($child->children() as $module) {
                $mod = $module->attributes()['name'] . '';
                $mod_name = ($mod);
                $mod_class = ucwords(str_replace('_', ' ', $mod));
                $mod_class = str_replace(' ', '', $mod_class);

                $modules_namespace_use .= "
use Spa\Object\Modules\\$mod_class;";

                $get .= "
            case '$mod_name':
                return new $mod_class(\$this->spa, '$mod_name');
";
                getInterfacesEnumData($data, $module, $mod_class, $mod_name);
            }
        }
    }

    $get .= '
            default:
                throw new ModuleException("Could not find the module called $mod");
        }
    }';

    createModulesEnum($get, $construct, $modules_namespace_use, $modules_content);
}

function createModulesEnum($get, $construct, $use, $items, $file_path = '../src/Spa/Object/Modules.php') {
    $content = <<<EOF
<?php 

namespace Spa\Object;

use Spa\Exceptions\ModuleException;
$use

/**
 * Class Modules
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Modules {
    $items
    $construct

    $get
}

//end of script

EOF;

    $file = fopen($file_path, "w") or die("Unable to open file!");
    fwrite($file, $content);
    fclose($file);
}

/**
 * 各接口的选择类，用来选择各接口，返回接口请求实体
 *
 */
function getInterfacesEnumData($data, $module, $mod_class, $mod_name) {
    $interface_content = '
    /**
     * Instance of Spa.
     */
    protected $spa;

    /**
     * Module.
     */
    protected $mod;';

    $interface_namespace_use = '';
    $construct = '
    /**
     * Init .
     */
    public function __construct($spa, $mod) {
        $this->spa = $spa;

        $this->mod = $mod;
    }';

    $get = '
    public function __get($interface) {
        switch ($interface) {';

    foreach ($module as $key => $value) {
        if ($key === 'interface') {
            $interface_name = $value->attributes()['service'] . '';
            $method = $value->attributes()['reqType'] . '';

            $interface_class = ucwords(str_replace('_', ' ', $interface_name));
            $interface_class = str_replace(' ', '', $interface_class);
            $interface_enum = lcfirst($interface_class);

            $interface_namespace_use .= "
use Spa\Object\Interfaces\\$mod_class\\$interface_class;";

            $get .= "
            case '$interface_name':
                return new $interface_class(\$this->spa, \$this->mod, '$interface_name');
";

            creatEnum($mod_class, $interface_class, $value);
            creatInterface($data, $mod_class, $interface_class, $method, $value, $mod_name, $interface_name);
        }

    }

    $get .= '
            default:
                throw new InterfaceException("Could not find the interface of the module called $interface ");
        }
    }';

    createInterfacesEnum($get, $construct, $interface_namespace_use, $mod_class, $interface_content);
}

/**
 * 生成接口枚举类，用于选择接口
 *
 * @param object $get        get 魔术方法
 * @param string $construct  构造函数
 * @param string $use        use 信息
 * @param string $class_name 所属模块名
 * @param string $items      类成员变量数据
 * @param string $base_path  接口枚举类路径
 * @return void
 */
function createInterfacesEnum($get, $construct, $use, $class_name, $items = '', $base_path = '../src/Spa/Object/Modules/') {
    $content = <<<EOF
<?php 

namespace Spa\Object\Modules;

use Spa\Exceptions\InterfaceException;
$use

/**
 * Class $class_name
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class $class_name {
    $items
    $construct
    $get
}

//end of script

EOF;
    
    $file_path = $base_path . $class_name . '.php';

    $file = fopen($file_path, "w") or die("Unable to open file!");
    fwrite($file, $content);
    fclose($file);
}

/**
 * 生成接口对象实体，包含发送请求，参数列表信息
 *
 * @param object $data            idl 根节点
 * @param string $mod_class       模块的类名
 * @param string $interface_class 接口类名
 * @param string $method          请求的 HTTP 方式
 * @param string $interface       interface 的节点
 * @param string $mod_name        当前模块原始名称
 * @param string $interface_name  当前接口原始名称
 * @return void
 */
function creatInterface($data, $mod_class, $interface_class, $method, $interface, $mod_name, $interface_name) {
    $arr = array();
    $method = strtoupper($method);
    $field_info = 'array(
';

    foreach ($interface as $key => $value) {

        if ($key === 'request') {
            foreach ($value as $k => $v) {

                $name = $v->attributes()['name'] . '';

                // extendType 有继承其他模块的情况，重选 mod
                $extendType = $v->attributes()['type'] . '';
                $ext_mod_name = $mod_name;
                if (strpos($extendType, '.') !== false) {
                    $t = explode('.', $extendType);
                    $extendType = array_pop($t);
                    $ext_mod_name = implode($t, '');
                }

                $require = $v->attributes()['require'] . '';

                $arr = getExtendTypeInfo($data, $ext_mod_name, $interface_name, $extendType);
                $arr['extendType'] = $extendType;
                $arr['require'] = $require;
                $arr['name'] = $name;

                $type = isset($arr['type']) ? $arr['type'] : '';

                $description = isset($arr['description']) ? $arr['description'] : '';
                $description = str_replace('\'', '"', $description);
                $description = $description ? "'description' => '" . $description . "'," : '';

                $restraint = isset($arr['restraint']) ? $arr['restraint'] : '';
                $restraint = str_replace('\'', '"', $restraint);
                $restraint = $restraint ? "'restraint' => '" . $restraint . "'," : '';

                $errormsg = isset($arr['errormsg']) ? $arr['errormsg'] : '';
                $errormsg = str_replace('\'', '"', $errormsg);
                $errormsg = $errormsg ? "'errormsg' => '" . $errormsg . "'," : '';

                
                $max_length = isset($arr['max_length']) ? "'max_length' => '" . $arr['max_length'] . "'," : '';
                $min_length = isset($arr['min_length']) ? "'min_length' => '" . $arr['min_length'] . "'," : '';
                $list = isset($arr['list']) ? "'list' => '" . $arr['list'] . "'," : '';
                $pattern = isset($arr['pattern']) ? "'pattern' => '" . $arr['pattern'] . "'," : '';
                $enum = isset($arr['enum']) ? "'enum' => '" . $arr['enum'] . "'," : '';
                $source = isset($arr['source']) ? "'source' => '" . $arr['source'] . "'," : '';
                $max = isset($arr['max']) ? "'max' => '" . $arr['max'] . "'," : '';
                $min = isset($arr['min']) ? "'min' => '" . $arr['min'] . "'," : '';
                $item_max_length = isset($arr['item_max_length']) ? "'item_max_length' => '" . $arr['item_max_length'] . "'," : '';
                $max_size = isset($arr['max_size']) ? "'max_size' => '" . $arr['max_size'] . "'," : '';
                $min_size = isset($arr['min_size']) ? "'min_size' => '" . $arr['min_size'] . "'," : '';
                $decimalLength = isset($arr['decimalLength']) ? "'decimalLength' => '" . $arr['decimalLength'] . "'," : '';

                /** element 生成 **/
                /* 递归层数 */
                $flag = 0;
                $element = getElements($data, $arr, $mod_name, $interface_name, $flag);

                /** repeated 生成 **/
                $repeat = getRepeated($data, $arr, $mod_name, $interface_name);

                $field_info .= "
            '$name' => array(
                'name' => '$name',
                'extendType' => '$extendType',
                'require' => '$require',
                'type' => '$type',
                $description
                $restraint
                $errormsg
                $max_length
                $min_length
                $list
                $pattern
                $enum
                $source
                $max
                $min
                $decimalLength
                $item_max_length
                $element
                $repeat
            ),
";

                $pattern = "\r\n                \r\n";
                while (strpos($field_info, $pattern) != false) {
                    $field_info = str_replace($pattern, "\r\n", $field_info);
                }
                $pattern = "\r\n                    \r\n";
                while (strpos($field_info, $pattern) != false) {
                    $field_info = str_replace($pattern, "\r\n", $field_info);
                }
                $pattern = "\r\n                        \r\n";
                while (strpos($field_info, $pattern) != false) {
                    $field_info = str_replace($pattern, "\r\n", $field_info);
                }
            }
        }
    }

    $field_info .= '
        );';

    $content = <<<EOF
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

EOF;

    $file_path = '../src/Spa/Object/Interfaces/' . $mod_class . '/' . $interface_class . '.php';

    //mkdir('../src/Spa/Object/Interfaces/' . $mod_class);

    $file = fopen($file_path, "w") or die("Unable to open file!");
    fwrite($file, $content);
    fclose($file);

}

/**
 * 拼接 array 数据
 *
 * @param object $data           idl 根节点
 * @param array  $arr            需要用到的 element 信息
 * @param string $mod_name       当前模块名称
 * @param string $interface_name 当前接口名称
 * @return string
 */
function getRepeated($data, $arr, $mod_name, $interface_name) {
    $repeat = '';
    $repeated = isset($arr['repeated']) ? $arr['repeated'] : null;

    if ($repeated) {
        $repeat_type = isset($repeated['type']) ? "'type' => '" . $repeated['type'] . "'," : '';
        $repeat_list = isset($repeated['list']) ? "'list' => '" . $repeated['list'] . "'," : '';
        $repeat_pattern = isset($repeated['pattern']) ? "'pattern' => '" . $repeated['pattern'] . "'," : '';
        $repeat_item_max_length = isset($repeated['item_max_length']) ? "'item_max_length' => '" . $repeated['item_max_length'] . "'," : '';
        $repeat_max = isset($repeated['max']) ? "'max' => '" . $repeated['max'] . "'," : '';
        $repeat_min = isset($repeated['min']) ? "'min' => '" . $repeated['min'] . "'," : '';
        $repeat_enum = isset($repeated['enum']) ? "'enum' => '" . $repeated['enum'] . "'," : '';
        $repeat_source = isset($repeated['source']) ? "'source' => '" . $repeated['source'] . "'," : '';

        // array element 获取
        $repeat_element = '';
        $repeat_name = '';
        $t = $repeated['type'];
        if ($t === 'filter_struct' || $t === 'creative_struct') {
            $ele_arr = getExtendTypeInfo($data, $mod_name, $interface_name, $t);
            $repeat_element = getElements($data, $ele_arr, $mod_name, $interface_name, 100);
            $repeat_name = "'name' => '$t',";
        }

        $repeat = "
                'repeated' => array(
                    $repeat_type
                    $repeat_name
                    $repeat_list
                    $repeat_pattern
                    $repeat_item_max_length
                    $repeat_enum
                    $repeat_source
                    $repeat_max
                    $repeat_min
                    $repeat_element
                )";


        $pattern = "\r\n                    \r\n";
        while (strpos($repeat, $pattern) != false) {
            $repeat = str_replace($pattern, "\r\n", $repeat);
        }
    }

    return $repeat;
}

/**
 * 递归拼接 element 数据
 *
 * @param object $data           idl 根节点
 * @param array  $arr            需要用到的 element 信息
 * @param string $mod_name       当前模块名称
 * @param string $interface_name 当前接口名称
 * @param string $flag           当前遍历 element 层级
 * @return string
 */
function getElements($data, $arr, $mod_name, $interface_name, $flag) {
    $flag++;
    $element = '';
    $ele = isset($arr['element']) ? $arr['element'] : null;
    if ($ele) {
        $element = "'element' => array(";
        foreach ($ele as $key => $value) {
            $ele_name = isset($value['name']) ? "'name' => '" . $value['name'] . "'," : '';
            $ele_extendType = isset($value['extendType']) ? "'extendType' => '" . $value['extendType'] . "'," : '';
            $ele_require = isset($value['require']) ? "'require' => '" . $value['require'] . "'," : '';

            $ele_ext_type = $value['extendType'];
            $ele_ext_mod_name = $mod_name;
            if (strpos($ele_ext_type, '.') !== false) {
                $t = explode('.', $ele_ext_type);
                $ele_ext_type = array_pop($t);
                $ele_ext_mod_name = implode($t, '');
            }
            $ele_arr = getExtendTypeInfo($data, $ele_ext_mod_name, $interface_name, $value['extendType']);

            $ele_type = isset($ele_arr['type']) ? "'type' => '" . $ele_arr['type'] . "'," : '';
            $ele_description = isset($ele_arr['description']) ? $ele_arr['description'] : '';
            $ele_description = str_replace('\'', '"', $ele_description);
            $ele_description = $ele_description ? "'description' => '" . $ele_description . "'," : '';

            $ele_restraint = isset($ele_arr['restraint']) ? $ele_arr['restraint'] : '';
            $ele_restraint = str_replace('\'', '"', $ele_restraint);
            $ele_restraint = $ele_restraint ? "'restraint' => '" . $ele_restraint . "'," : '';

            $ele_errormsg = isset($ele_arr['errormsg']) ? $ele_arr['errormsg'] : '';
            $ele_errormsg = str_replace('\'', '"', $ele_errormsg);
            $ele_errormsg = $ele_errormsg ? "'errormsg' => '" . $ele_errormsg . "'," : '';

            $ele_max_length = isset($ele_arr['max_length']) ? "'max_length' => '" . $ele_arr['max_length'] . "'," : '';
            $ele_min_length = isset($ele_arr['min_length']) ? "'min_length' => '" . $ele_arr['min_length'] . "'," : '';
            $ele_list = isset($ele_arr['list']) ? "'list' => '" . $ele_arr['list'] . "'," : '';
            $ele_pattern = isset($ele_arr['pattern']) ? "'pattern' => '" . $ele_arr['pattern'] . "'," : '';
            $ele_enum = isset($ele_arr['enum']) ? "'enum' => '" . $ele_arr['enum'] . "'," : '';
            $ele_source = isset($ele_arr['source']) ? "'source' => '" . $ele_arr['source'] . "'," : '';
            $ele_max = isset($ele_arr['max']) ? "'max' => '" . $ele_arr['max'] . "'," : '';
            $ele_min = isset($ele_arr['min']) ? "'min' => '" . $ele_arr['min'] . "'," : '';
            $ele_item_max_length = isset($ele_arr['item_max_length']) ? "'item_max_length' => '" . $ele_arr['item_max_length'] . "'," : '';
            $ele_max_size = isset($ele_arr['max_size']) ? "'max_size' => '" . $ele_arr['max_size'] . "'," : '';
            $ele_min_size = isset($ele_arr['min_size']) ? "'min_size' => '" . $ele_arr['min_size'] . "'," : '';
            $ele_decimalLength = isset($ele_arr['decimalLength']) ? "'decimalLength' => '" . $ele_arr['decimalLength'] . "'," : '';

            // 递归获取 element
            $ele_element = getElements($data, $ele_arr, $mod_name, $interface_name, $flag);

            $element .= "
                    '$key' => array(
                        $ele_name
                        $ele_extendType
                        $ele_require
                        $ele_type
                        $ele_description
                        $ele_restraint
                        $ele_errormsg
                        $ele_max_length
                        $ele_min_length
                        $ele_list
                        $ele_pattern
                        $ele_enum
                        $ele_source
                        $ele_max
                        $ele_min
                        $ele_decimalLength
                        $ele_item_max_length
                        $ele_element
                    ),
";
        }
        $element .= "
                ),";

        switch ($flag) {
            case '1':
                $pattern = "\r\n                        \r\n";
                while (strpos($element, $pattern) != false) {
                    $element = str_replace($pattern, "\r\n", $element);
                }
                break;
            
            case '2':
                $pattern = "\r\n";
                $element = str_replace($pattern, "\r\n        ", $element);
                $pattern = "\r\n                                \r\n";
                while (strpos($element, $pattern) != false) {
                    $element = str_replace($pattern, "\r\n", $element);
                }
                break;

            case '3':
                $pattern = "\r\n";
                $element = str_replace($pattern, "\r\n                ", $element);
                $pattern = "\r\n                                        \r\n";
                while (strpos($element, $pattern) != false) {
                    $element = str_replace($pattern, "\r\n", $element);
                }
                break;

            // array element 专用通道
            case '101':
                $pattern = "\r\n";
                $element = str_replace($pattern, "\r\n    ", $element);
                $pattern = "\r\n                            \r\n";
                while (strpos($element, $pattern) != false) {
                    $element = str_replace($pattern, "\r\n", $element);
                }
                break;

            default: break;
        }

    }

    return $element;
}

/**
 * 获得 extendType 的数据的信息
 *
 * @param object $data           idl 根节点
 * @param string $mod_name       当前模块名称
 * @param string $interface_name 当前接口名称
 * @param string $extendType     所要获取的 type 类型
 * @return array
 */
function getExtendTypeInfo($data, $mod_name, $interface_name, $extendType) {
    $arr = array();

    foreach ($data->children()->children() as $child) {
        if ($child->getName() === 'service') {
            // module
            foreach ($child->children() as $mod_key => $module) {
                if (($module->attributes()['name'] . '') === $mod_name) {
                    foreach ($module as $key => $value) {
                        // interface
                        if ($key === 'interface') {
                            if (($value->attributes()['service'] . '') === $interface_name) {
                                foreach ($value as $k => $v) {
                                    if ($k === 'types') {
                                        foreach ($v as $k1 => $v1) {
                                            if (($v1->attributes()['name'] . '') === $extendType) {
                                                $type = $v1->attributes()['extends'] . '';
                                                $arr = processField($v1);

                                                return $arr;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        // module > types
                        if ($key === 'types') {
                            foreach ($value as $k => $v) {
                                if (($v->attributes()['name'] . '') === $extendType) {
                                    $type = $v->attributes()['extends'] . '';
                                    $arr = processField($v);

                                    return $arr;
                                }
                            }
                        }
                    }
                }
            }
        }
        // types
        if ($child->getName() === 'types') {
            foreach ($child->children() as $k => $v) {
                if (($v->attributes()['name'] . '') === $extendType) {
                    $type = $v->attributes()['extends'] . '';
                    $arr = processField($v);

                    return $arr;
                }
            }
        }
    }
}

/**
 * 读取 simpleType 或者 complexType 中的数据结构
 *
 * @param object $data simpleType or complexType
 * @return array
 */
function processField($data) {
    $type = $data->attributes()['extends'] . '';
    $arr['type'] = $type;

    switch ($type) {
        case 'string':
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'max_length') {
                        $arr['max_length'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'min_length') {
                        $arr['min_length'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'list') {
                        $arr['list'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'pattern') {
                        $arr['pattern'] = $attr['value'] . '';
                    }
                }
                if ($key === 'restriction') {
                    foreach ($value as $k => $v) {
                        if (($v->attributes()['type'] . '') === 'enum') {
                            $arr['enum'] = 'enum';
                            $arr['source'] = $v->attributes()['source'] . '';
                        }
                    }
                }
            }
            return $arr;
        
        case 'integer':
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }
                }
                if ($key === 'restriction') {
                    foreach ($value as $k => $v) {
                        if (($v->attributes()['type'] . '') === 'integer') {
                            foreach ($v as $key => $value) {
                                $attr = $value->attributes();
                                if ($key === 'max') {
                                    $arr['max'] = $attr['value'] . '';
                                }
                                if ($key === 'min') {
                                    $arr['min'] = $attr['value'] . '';
                                }
                            }
                        }
                    }
                }
            }
            return $arr;

        case 'float':
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }
                }
                if ($key === 'restriction') {
                    foreach ($value as $k => $v) {
                        if (($v->attributes()['type'] . '') === 'float') {
                            foreach ($v as $key => $value) {
                                $attr = $value->attributes();
                                if ($key === 'max') {
                                    $arr['max'] = $attr['value'] . '';
                                }
                                if ($key === 'min') {
                                    $arr['min'] = $attr['value'] . '';
                                }
                                if ($key === 'decimalLength') {
                                    $arr['decimalLength'] = $attr['value'] . '';
                                }
                            }
                        }
                    }
                }
            }
            return $arr;

        case 'id':

        case 'number':
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }

                    $arr['max'] = '9223372036854775807';
                    $arr['min'] = '1';
                }
            }
            return $arr;

        case 'struct':
            $arr['element'] = array();
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }
                }
                if ($key === 'element') {
                    $attr = $value->attributes();
                    $name = $attr['name'] . '';
                    $extendType = $attr['type'] . '';
                    $require = $attr['require'] . '';
                    $arr['element'][$name] = array(
                                                'name'       => $name,
                                                'extendType' => $extendType,
                                                'require'    => $require
                                            );
                }
            }
            return $arr;

        case 'array':
            foreach ($data as $key => $value) {
                if ($key === 'attribute') {
                    $attr = $value->attributes();
                    if (($attr['name'] . '') === 'description') {
                        $arr['description'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'restraint') {
                        $arr['restraint'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'errormsg') {
                        $arr['errormsg'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'list') {
                        $arr['list'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'pattern') {
                        $arr['pattern'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'max_size') {
                        $arr['max_size'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'min_size') {
                        $arr['min_size'] = $attr['value'] . '';
                    }
                    if (($attr['name'] . '') === 'item_max_length') {
                        $arr['item_max_length'] = $attr['value'] . '';
                    }
                }
                if ($key === 'repeated') {
                    $type = ($value->attributes()['type'] . '');
                    $arr['repeated']['type'] = $type;
                    switch ($type) {
                        case 'string':
                            foreach ($value as $k => $v) {
                                $attr = $v->attributes();
                                $type = $attr['type'] . '';
                                if ($type === 'string') {
                                    foreach ($v as $k1 => $v1) {
                                        $attr = $v1->attributes();
                                        if (($attr['value'] . '') === '@item_max_length') {
                                            $arr['repeated']['item_max_length'] = $arr['item_max_length'];
                                        }
                                        if (($attr['value'] . '') === '@list') {
                                            $arr['repeated']['list'] = $arr['list'];
                                        }
                                        if (($attr['value'] . '') === '@pattern') {
                                            $arr['repeated']['pattern'] = $arr['pattern'];
                                        }
                                    }
                                }
                                if ($type === 'enum') {
                                    $arr['repeated']['enum'] = $attr['type'] . '';
                                    $arr['repeated']['source'] = $attr['source'] . '';

                                    foreach ($v as $k1 => $v1) {
                                        if ($k1 === 'itemMaxLength') {
                                            $arr['repeated']['item_max_length'] = $arr['item_max_length'];
                                        }
                                    }
                                }
                            }
                            return $arr;

                        case 'integer':
                            foreach ($value as $k => $v) {
                                foreach ($v as $k1 => $v1) {
                                    $attr = $v1->attributes();
                                    if ($k1 === 'max') {
                                        $arr['repeated']['max'] = $attr['value'] . '';
                                    }
                                    if ($k1 === 'min') {
                                        $arr['repeated']['min'] = $attr['value'] . '';
                                    }
                                }
                            }
                            return $arr;

                        case 'filter_struct':
                            foreach ($value as $k => $v) {
                                foreach ($v as $k1 => $v1) {
                                    $attr = $v1->attributes();
                                    if ($k1 === 'itemMaxLength') {
                                        $arr['repeated']['item_max_length'] = $arr['item_max_length'];
                                    }
                                }
                            }
                            return $arr;

                        case 'creative_struct':
                            foreach ($value as $k => $v) {
                                foreach ($v as $k1 => $v1) {
                                    $attr = $v1->attributes();
                                    if ($k1 === 'itemMaxLength') {
                                        $arr['repeated']['item_max_length'] = $arr['item_max_length'];
                                    }
                                }
                            }
                            return $arr;

                        default: break;
                    }
                }
            }
            return $arr;

        default: break;
    }

}