<?php 

namespace Tsa;

use Tsa\App;
use Tsa\Exceptions\TsaSDKException;
use Tsa\Url\UrlDetector;

/**
 * Class Request
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
class Request
{
    /**
     * @var App The Tsa app entity.
     */
    protected $app;

    /**
     * @var string The HTTP method.
     */
    protected $method;

    /**
     * @var string The url.
     */
    protected $url;

    /**
     * @var array The parameters to send.
     */
    protected $params = array();

    /**
     * @var array The headers to send.
     */
    protected $headers = array();

    /**
     * @var string|null The access token.
     */
    protected $accessToken;

    /**
     * @param App|null      $app          The App entity.
     * @param string|null   $method       The HTTP method.
     * @param string|null   $url          The endpoint.
     * @param array|array() $params       Params.
     * @param array|array() $headers      Headers info.
     * @param string|null   $access_token Access token.
     *
     * @return
     */
    public function __construct(App $app = null, $method = null, $url = null, $params = array(), $headers = array(), $access_token = null)
    {
        $this->setApp($app);
        $this->setMethod($method);
        $this->setUrl($url);
        $this->setParams($params);
        $this->setHeaders($headers);
        $this->setAccessToken($access_token);
    }

    /**
     * Set the App entity.
     *
     * @param App|null $app
     *
     * @return Request
     */
    public function setApp(App $app = null)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Return the App entity.
     *
     * @return App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set the HTTP method.
     *
     * @param string $method
     *
     * @return Request
     */
    public function setMethod($method)
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * Return the HTTP method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Validate the HTTP method.
     *
     * @throws TsaSDKException
     */
    public function validateMethod()
    {
        if (!$this->method) {
            throw new TsaSDKException('Please input HTTP method.');
        }

        if (!in_array($this->method, array('GET', 'POST'))) {
            throw new TsaSDKException('Invalid HTTP method, only support "POST" and "GET".');
        }
    }

    /**
     * Set the url.
     *
     * @param string $url
     *
     * @return Request
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Return the url.
     *
     * @return string
     */
    public function getUrl()
    {
        $this->validateMethod();

        $url = UrlDetector::validateModuleAndAct($this->url);
        $url = UrlDetector::detectPrefix($url);

        if ($this->getMethod() !== 'POST') {
            $params = $this->getParams();
            $url = UrlDetector::appendParamsToUrl($url, $params);
        } else {
            $url = UrlDetector::removeParams($url);
        }

        return $url;
    }

    /**
     * Set the params.
     *
     * @param array $params
     *
     * @return Request
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Return the params.
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Return the POST params.
     *
     * @return array
     */
    public function getPostParams()
    {
        if ($this->getMethod() === 'POST') {
            return $this->getParams();
        }

        return array();
    }

    /**
     * Set the headers.
     *
     * @param array $headers
     *
     * @return Request
     */
    public function setHeaders($headers)
    {
        $this->headers = array_merge($this->headers, $headers);

        return $this;
    }

    /**
     * Return the headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        $headers = $this->headers;

        if (!isset($headers['Authorization'])) {
            if (!$this->getAccessToken()) {
                throw new TsaSDKException('Don \'t get the "Authorization" header, please check you headers or access token');
            }

            $headers['Authorization'] = $this->getAccessToken();
        }

        return array_merge($this->getDefaultHeaders(), $headers);
    }

    /**
     * Set the access token.
     *
     * @param AccessToken|string $access_token
     *
     * @return Request
     */
    public function setAccessToken($access_token)
    {
        if ($access_token) {
            $this->accessToken = $access_token;
        } else {
            $this->accessToken = $this->getApp()->getAccessToken()->getValue();
        }

        return $this;
    }

    /**
     * Return the access token.
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Validate that an access token exists for this request.
     *
     * @return void
     */
    public function validateAccessToken()
    {
        $access_token = $this->getAccessToken();

        if (!$access_token) {
            throw new TsaSDKException('You must provide a validate access token.');
        }
    }

    /**
     * Return the default headers that every request should have.
     *
     * @return array
     */
    private function getDefaultHeaders()
    {
        return array(
            'Accept-Encoding' => '*',
        );
    }

}

//end of script
