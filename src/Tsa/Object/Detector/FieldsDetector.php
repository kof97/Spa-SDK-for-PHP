<?php 

namespace Tsa\Object\Detector;

use Tsa\Exceptions\ParamsException;

/**
 * Class FieldsDetector
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class FieldsDetector
{
    private function __construct()
    {
        // It should never be invoked.
    }

    /**
     * Validate the fields.
     *
     * @param array $data   The field info.
     * @param array $params The params that users want to send.
     */
    public static function validateField($params, $data)
    {
        if (empty($params)) {
            return;
        }

        // validate the required field
        self::validateRequireField($data, $params);

        foreach ($params as $key => $value) {
            if (!isset($data[$key])) {
                continue;
            }

            self::validateBasicType($data[$key], $key, $value);
        }
    }

    /**
     * Validate the basic type fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateBasicType($data, $key, $value)
    {
        $type = $data['type'];
        switch ($type) {
            case 'string':
                self::validateString($data, $key, $value);
                continue;

            case 'integer':
                self::validateInteger($data, $key, $value);
                continue;

            case 'float':
                self::validateFloat($data, $key, $value);
                continue;

            case 'id':

            case 'number':
                self::validateInteger($data, $key, $value);
                break;

            // creative_struct and filter_struct is belong to array type.
            case 'creative_struct':

            case 'filter_struct':

            case 'struct':
                self::validateStruct($data, $key, $value);
                break;

            case 'array':
                self::validateArray($data, $key, $value);
                break;

            default: break;
        }
    }

    /**
     * Validate the string format fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateString($data, $key, $value)
    {
        $origin_value = $value;
        $value = trim($value);

        if (!is_scalar($value) || is_bool($value)) {
            throw new ParamsException("Error in '$origin_value', the value of field '$key' needs the type 'string'.");
        }

        $len = strlen($value);

        if (isset($data['list'])) {
            $list = explode(',', $data['list']);
            if (!in_array($value, $list)) {
                $list = implode($list, ',');
                throw new ParamsException("Error in '$origin_value', the value of field '$key' is limited in '$list'.");
            }
        }

        if (isset($data['pattern'])) {
            self::validatePattern($data['pattern'], $key, $value);
        }

        if (isset($data['max_length'])) {
            if ($len > ($max_length = $data['max_length'])) {
                throw new ParamsException("Error in '$origin_value', the length of field '$key' is too long, it expects the length can't more than '$max_length'.");
            }
        }

        if (isset($data['min_length'])) {
            if ($len < ($min_length = $data['min_length'])) {
                throw new ParamsException("Error in '$origin_value', the length of field '$key' is too short, it expects the length at least '$min_length'.");
            }
        }

    }

    /**
     * Validate the integer format fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateInteger($data, $key, $value)
    {
        $origin_value = $value;

        // // check the type like '015'
        // if ($value != 0) {
        //     $value = ltrim($value, '0');
        // }

        if ($value . '' !== intval($value) . '') {
            throw new ParamsException("Error in '$origin_value', the value of field '$key' needs the type 'int'.");
        }

        if (isset($data['max'])) {
            if ($value > ($max = $data['max'])) {
                throw new ParamsException("Error in '$origin_value', the value of field '$key' is big, it expects the value less than '$max'.");
            }
        }

        if (isset($data['min'])) {
            if ($value < ($min = $data['min'])) {
                throw new ParamsException("Error in '$origin_value', the value of field '$key' is small, it expects the value more than '$min'.");
            }
        }
    }
 
    /**
     * Validate the float format fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateFloat($data, $key, $value)
    {
        $origin_value = $value;

        if (!is_scalar($value) || is_bool($value)) {
            throw new ParamsException("Error in '$origin_value', the value of field '$key' needs the type 'float'.");
        }

        if (strpos($value, '.')) {
            $value = rtrim($value, '0');
        }

        if ($value . '' !== floatval($value) . '') {
            throw new ParamsException("Error in '$origin_value', the value of field '$key' needs the type 'float'.");
        }

        if (isset($data['decimalLength'])) {
            $decimal_length = $data['decimalLength'];

            $decimal = substr($value, strpos($value, '.') + 1);
            if (strlen($decimal) > $decimal_length) {
                throw new ParamsException("Error in '$origin_value', the decimal length expects the value less than '$decimal_length'.");
            }
        }

        if (isset($data['max'])) {
            if ($value > ($max = $data['max'])) {
                throw new ParamsException("Error in '$origin_value', the value of field '$key' is big, it expects the value less than '$max'.");
            }
        }

        if (isset($data['min'])) {
            if ($value < ($min = $data['min'])) {
                throw new ParamsException("Error in '$origin_value', the value of field '$key' is small, it expects the value more than '$min'.");
            }
        }
    }

    /**
     * Validate the struct format fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateStruct($data, $key, $value)
    {
        $origin_value = $value;

        if (is_object($value) || is_array($value)) {
            $value = json_encode($value);
        }

        /* check the json */
        $value = strtr($value, "'", "\"");
        $value = preg_replace('/:(\s)*(,|})/', ':"",', $value);
        $value = preg_replace('/:(\s)*"(\s)*(,|})/', ':"",', $value);
        $value = preg_replace('/:(\s)*\'(\s)*(,|})/', ':"",', $value);

        $value = (array)json_decode($value);

        if (empty($value)) {
            throw new ParamsException("Error in the value '$origin_value' of the '$key', it needs the 'json' format.");
        }

        self::validateRequireField($data, $value);

        if (isset($data['element'])) {
            $element = $data['element'];
            $struct_name = $data['name'];

            foreach ($value as $key => $v) {
                if (!isset($element[$key])) {
                    continue;
                }

                self::validateBasicType($element[$key], $key, $v);
            }
        }
    }

    /**
     * Validate the array format fields.
     *
     * @param array $data  The field info.
     * @param array $key   The user's params key.
     * @param array $value The user's params value.
     */
    protected static function validateArray($data, $key, $value)
    {
        if (!is_array($value)) {
            if (is_string($value)) {
                $value = json_decode($value, true);
            } else {
                throw new ParamsException("Error in '$value', the value of field '$key' needs the format 'array'.");
            }
        }

        foreach ($value as $v) {
            self::validateBasicType($data['repeated'], $data['name'], $v);
        }
    }

    /**
     * Validate the fields that need use the pattern.
     *
     * @param array $pattern The pattern.
     * @param array $key     The user's params key.
     * @param array $value   The user's params value.
     */
    protected static function validatePattern($pattern, $key, $value)
    {
        $origin_value = $value;

        switch ($pattern) {
            case '{url_pattern}':
                //$regex = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
                $regex = '/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
                $err_msg = "The value of field '$key', '$origin_value' is not a validate value, It needs to like 'https://github.com'.";
                break;
            
            case '{age_pattern}':
                if ($value . '' !== intval($value) . '') {
                    throw new ParamsException("Error in '$origin_value', the value of field '$key' needs the type 'int'.");
                }
                return;

            case '{memo_pattern}':
                
                break;

            case '{date_pattern}':
                // 2016-12-11
                $regex = '/^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/';
                $err_msg = "The value of field '$key', '$origin_value' is not a validate value, It needs to like '2016-12-11'.";
                break;

            default:
                $regex = $pattern;
                $err_msg = "The value of field '$key', '$origin_value' is not a validate value.";
                break;
        }

        $res = preg_match($regex, $value);

        if (!$res) {
            throw new ParamsException($err_msg);
        }
    }

    /**
     * Validate the required fields.
     *
     * @param array $data   The field info.
     * @param array $params The params that users want to send.
     */
    protected static function validateRequireField($data, $params)
    {
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
                    throw new ParamsException("Expect the required params '$key' in the element '$struct_name' that you didn't provide.");
                }
                throw new ParamsException("Expect the required params '$key' that you didn't provide.");
            }
        }
    }

}

//end of script
