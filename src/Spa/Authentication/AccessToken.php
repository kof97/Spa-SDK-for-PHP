<?php 

namespace Spa\Authentication;

/**
 * Class AccessToken
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class AccessToken
{
    /**
     * The access token value.
     *
     * @var string
     */
    protected $value = '';

    /**
     * @param string $appid
     * @param string $appkey
     *
     * @return
     */
    public function __construct($appid, $appkey) {
        $this->value = $this->createAccessToken($appid, $appkey);
    }

    /**
     * Returns the value.
     *
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * calculate the access token
     *
     * @param string $appid
     * @param string $appkey
     * @return string AccessToken
     */
    private function createAccessToken($appid, $appkey) {
        $time = time();
        $uid = $appid;

        $sign = sha1($appid . $appkey . $time);
        $token = base64_encode($uid . ',' . $appid . ',' . $time . ',' . $sign);

        return 'Bearer ' . $token;
    }

    /**
     * Returns the access token as a string.
     *
     * @return string
     */
    public function __toString() {
        return $this->getValue();
    }

}

//end of script
