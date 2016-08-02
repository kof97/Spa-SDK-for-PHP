<?php 

namespace Spa\Object\Detector;

use Spa\Exceptions\ParamsException;

/**
 * Class FieldsDetector
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class FieldsDetector {

    private function __construct() {
        // It would never be used.
    }

    public static function validateField($params, $data) {
        if (empty($params)) {
            return;
        }

        // validate the required field
        self::validateRequireField($data, $params);

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

            $type = $data[$key]['type'];
            switch ($type) {
                case 'string':
                    self::validateString($data[$key], $key, $value);
                    continue;

                case 'integer':
                    self::validateInteger($data[$key], $key, $value);
                    continue;

                case 'id':

                case 'number':
                    self::validateInteger($data[$key], $key, $value);
                    break;

                case 'struct':
                    self::validateStruct($data[$key], $key, $value);
                    break;

                case 'array':
                    
                    break;

                default: break;
            }
        }
    }

    protected static function validateString($data, $key, $value) {
        $len = strlen($value);
        if (isset($data['max_length'])) {
            if ($len > ($max_length = $data['max_length'])) {
                throw new ParamsException("Error in '$value', the length of field '$key' is too long, it expects the length can't more than '$max_length'");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("Error in '$value', the length of field '$key' is too short, it expects the length at least '$min_length'");
            }
        }

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("Error in '$value', the value of field '$key' is limited in '$list'");
            }
        }

        if (isset($data['pattern'])) {
            self::validatePattern($data['pattern'], $key, $value);
        }
    }

    protected static function validateInteger($data, $key, $value) {
        if ($value . '' !== intval($value) . '') {
            throw new ParamsException("Error in '$value', the value of field '$key' needs the type int");
        }

        if (isset($data['max'])) {
            if ($value >= ($max = $data['max'])) {
                throw new ParamsException("Error in '$value', the value of field '$key' is big, it expects the value less than '$max'");
            }
        }

        if (isset($data['min'])) {
            if ($value <= ($min = $data['min'])) {
                throw new ParamsException("Error in '$value', the value of field '$key' is small, it expects the value more than '$min'");
            }
        }
    }

    protected static function validateStruct($data, $key, $value) {
        $value = strtr($value, "'", "\"");
        $value = (array)json_decode($value);

        self::validateRequireField($data, $value);

        if (isset($data['element'])) {
            $element = $data['element'];
            $struct_name = $data['name'];

            foreach ($element as $key => $value) {
                var_dump($key);
                var_dump($value);
            }
        }
        
    }

    protected static function validatePattern($pattern, $key, $value) {
        switch ($pattern) {
            case '{url_pattern}':
                //$regex = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
                $regex = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
                break;
            
            case '{age_pattern}':
                if ($value . '' !== intval($value) . '') {
                    throw new ParamsException("Error in '$value', the value of field '$key' needs the type int");
                }
                return;

            case '{memo_pattern}':
                
                break;

            case '{date_pattern}':
                // 2016-12-11
                $regex = '/^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/';
                break;

            default:
                $regex = $pattern;
                break;
        }

        $res = preg_match($regex, $value);

        if (!$res) {
            throw new ParamsException("The value of field '$key', '$value' is not a validate value");
        }
    }

    protected static function validateRequireField($data, $params) {
        $from_element = 0;
        if (isset($data['element'])) {
            $struct_name = $data['name'];
            $data = $data['element'];
            $from_element = 1;
        }

        foreach ($data as $key => $value) {
            if ($value['require'] === 'no') {
                continue;
            }

            if (!isset($params[$key])) {
                if ($from_element) {
                    throw new ParamsException("Expect the required params '$key' in the element '$struct_name' that you didn't provide");
                }
                throw new ParamsException("Expect the required params '$key' that you didn't provide");
            }
        }
    }

}

//end of script
