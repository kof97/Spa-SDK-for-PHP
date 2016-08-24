<?php

namespace Spa;

use Spa\App;
use Spa\Client;
use Spa\Request;
use Spa\Exceptions\SpaSDKException;
use Spa\Http\ClientsFactory;
use Spa\Object\Modules;

/**
 * Class Spa
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Spa
{
    /**
     * @const SDK version.
     */
    const SDK_VERSION = 'v1.0.0';

    /**
     * @var App The Spa App entity.
     */
    protected $app;

    /**
     * @var Client The Spa client service.
     */
    protected $client;

    /**
     * @param string $appid
     * @param string $appkey
     *
     * @return
     */
    public function __construct($config = array())
    {
        if (!is_array($config)) {
            throw new SpaSDKException('The "config" must be formatted as an array.');
        }

        $config = array_merge(array(
            'appid'            => false,
            'appkey'           => false,
            'access_token'     => null,
            'version'          => 'v3',
            'http_client_type' => null
        ), $config);

        if (!$config['appid']) {
            throw new SpaSDKException('Required "appid" key not supplied in config or the "appid" key is not an effective value.');
        }

        if (!$config['appkey']) {
            throw new SpaSDKException('Required "appkey" key not supplied in config or the "appkey" key is not an effective value.');
        }

        $this->app = new App($config['appid'], $config['appkey']);

        $this->client = new Client(ClientsFactory::createClient($config['http_client_type']), $config['version']);
    }

    /**
     * Returns the SDK version.
     *
     * @return string
     */
    public function getVersion()
    {
        return static::SDK_VERSION;
    }

    /**
     * Returns the App entity.
     *
     * @return App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Returns the Client service.
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sends a GET request and returns the result.
     *
     * @param string                  $url
     * @param array|array()           $headers
     * @param AccessToken|string|null $access_token
     *
     * @return Response
     */
    public function get($url, $headers = array(), $access_token = null)
    {
        return $this->sendRequest(
            'GET',
            $url,
            $params = array(),
            $headers,
            $access_token
        );
    }

    /**
     * Sends a POST request and returns the result.
     *
     * @param string                  $url
     * @param array|array()           $params
     * @param array|array()           $headers
     * @param AccessToken|string|null $access_token
     *
     * @return Response
     */
    public function post($url, $params = array(), $headers = array(), $access_token = null)
    {
        return $this->sendRequest(
            'POST',
            $url,
            $params,
            $headers,
            $access_token
        );
    }

    /**
     * Sends a request and returns the result.
     *
     * @param string                  $method
     * @param string                  $url
     * @param array|array()           $params
     * @param array|array()           $headers
     * @param AccessToken|string|null $access_token
     *
     * @return Response
     */
    public function sendRequest($method, $url, $params = array(), $headers = array(), $access_token = null)
    {
        $request = $this->request($method, $url, $params, $headers, $access_token);

        return $this->client->sendRequest($request);
    }

    /**
     * Create a new Request entity.
     *
     * @param string                  $method
     * @param string                  $url
     * @param array|array()           $params
     * @param array|array()           $headers
     * @param AccessToken|string|null $access_token
     *
     * @return Request
     */
    public function request($method, $url, $params = array(), $headers = array(), $access_token = null)
    {
        return new Request(
            $this->app,
            $method,
            $url,
            $params,
            $headers,
            $access_token
        );
    }

    /**
     * Return Modules.
     */
    public function getModules()
    {
        return new Modules($this);
    }

}

//end of script
