<?php 

namespace Spa\Url;

use Spa\Exceptions\SpaSDKException;
use Spa\Url\UrlEndpointDetector;

/**
 * Class UrlDetector
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class UrlDetector
{
    private function __construct()
    {
        // It should never be invoked.
    }

    /**
     * Remove params from url.
     *
     * @param string $url
     *
     * @return string
     */
    public static function removeParams($url)
    {
        if (!$url) {
            return $url;
        }

        if (strpos($url, '?') === false) {
            return $url;
        }

        list($path, $params) = explode('?', $url, 2);

        return $path;
    }

    /**
     * Detect the module and act.
     *
     * @param string $url
     *
     * @return string|''
     */
    public static function validateModuleAndAct($url)
    {
        $divide = strpos($url, '?');
        $params = '';

        // get the endpoint and the params
        if ($divide === false) {
            $endpoint = $url;
        } else {
            list($endpoint, $params) = explode('?', $url, 2);
        }

        $endpoint = trim($endpoint, '/');

        // validate the module and act
        if (strpos($endpoint, '/') === false) {
            throw new SpaSDKException('Please check your "module" or "act" to ensure that is validated');
        }

        list($module, $act) = explode('/', $endpoint, 2);

        // validate module
        // validate act

        return $endpoint . '?' . $params;
    }

    /**
     * Check for a "/" prefix and prepend it if not exists.
     *
     * @param string|null $string
     *
     * @return string|''
     */
    public static function detectPrefix($url)
    {
        if (!$url) {
            return $url;
        }

        return strpos($url, '/') === 0 ? $url : '/' . $url;
    }

    /**
     * Append params to the URL.
     *
     * @param string $url        The URL.
     * @param array  $new_params The params used to append.
     *
     * @return string
     */
    public static function appendParamsToUrl($url, $new_params)
    {
        if (empty($new_params)) {
            return $url;
        }

        if (strpos($url, '?') === false) {
            return $url . '?' . http_build_query($new_params, null, '&');
        }

        list($path, $query) = explode('?', $url, 2);

        $existing_params = array();
        parse_str($query, $existing_params);

        // merge old params and new params
        $params = array_merge($new_params, $existing_params);

        ksort($params);

        return $path . '?' . http_build_query($params, null, '&');
    }

}

//end of script
