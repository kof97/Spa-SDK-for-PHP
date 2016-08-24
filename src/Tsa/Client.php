<?php 

namespace Spa;

use Spa\Exceptions\SpaSDKException;
use Spa\Http\ClientInterface;
use Spa\Http\ClientFactory;

/**
 * Class Client
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class Client
{
    /**
     * @const string Default base URL.
     */
    const DEFAULT_BASE_URL = 'http://api.e.qq.com/ads/v3';

    /**
     * @var string The api version.
     */
    protected $version;

    /**
     * @var ClientInterface HTTP client.
     */
    protected $httpClient;

    /**
     * @param ClientInterface|null $http_client
     * @param string|null          $version
     *
     * @return
     */
    public function __construct(ClientInterface $http_client = null, $version = null)
    {
        $this->httpClient = $http_client ? $http_client : $this->defaultHttpClient();
        $this->version = $version;
    }

    /**
     * Set the HTTP client.
     *
     * @param ClientInterface $http_client
     */
    public function setHttpClient(ClientInterface $http_client)
    {
        $this->httpClient = $http_client;
    }

    /**
     * Return the HTTP client.
     *
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Detect and set HTTP client to use.
     *
     * @return ClientInterface
     */
    protected function defaultHttpClient()
    {
        return ClientFactory::defaultClient();
    }

    /**
     * Retrun the base url.
     *
     * @return string
     */
    protected function getBaseUrl()
    {
        if ($this->version !== 'v3') {
            throw new SpaSDKException('Only support the version "v3", please check your config');
        }

        return static::DEFAULT_BASE_URL;
    }

    /**
     * Prepares the request for sending to the client.
     *
     * @param Request $request
     *
     * @return array
     */
    protected function prepareRequestMessage(Request $request)
    {
        $url = $this->getBaseUrl() . $request->getUrl();

        $request->setHeaders(array('Content-Type' => 'application/x-www-form-urlencoded'));

        return array(
            $url,
            $request->getMethod(),
            $request->getParams(),
            $request->getHeaders(),
        );
    }

    /**
     * Send the request and get the response.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function sendRequest(Request $request)
    {
        if (get_class($request) === 'Spa\Request') {
            $request->validateAccessToken();
        }

        list($url, $method, $params, $headers) = $this->prepareRequestMessage($request);

        $responseAnalyzer = $this->httpClient->send($url, $method, $params, $headers);

        $response = new Response(
            $request,
            $responseAnalyzer->getHeaders(),
            $responseAnalyzer->getBody(),
            $responseAnalyzer->getHttpResponseCode()
        );

        return $response;
    }

}

//end of script
