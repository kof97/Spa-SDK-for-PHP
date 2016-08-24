<?php 

namespace Tsa;

use Tsa\Authentication\AccessToken;
use Tsa\Exceptions\TsaSDKException;

/**
 * Class App
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class App
{
    /**
     * @var string The appid.
     */
    protected $appid;

    /**
     * @var string The appkey.
     */
    protected $appkey;

    /**
     * @param string $appid
     * @param string $appkey
     *
     * @return
     */
    public function __construct($appid, $appkey)
    {
        if (!is_string($appid) && !is_int($appid)) {
            throw new TsaSDKException('The "appid" must be formatted as a string or int.');
        }

        if (!is_string($appkey)) {
            throw new TsaSDKException('The "appkey" must be formatted as a string.');
        }

        $this->appid = $appid;
        $this->appkey = $appkey;
    }

    /**
     * Returns the appid.
     *
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * Returns the appkey.
     *
     * @return string
     */
    public function getAppkey()
    {
        return $this->appkey;
    }

    /**
     * Returns an app access token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        return new AccessToken($this->appid, $this->appkey);
    }

}

//end of script
