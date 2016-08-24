<?php 

namespace Spa\Http;

use InvalidArgumentException;
use Spa\Http\Curl\CurlClient;

/**
 * Class ClientsFactory
 *
 * @category PHP
 * @package  Spa
 * @author   Arno <arnoliu@tencent.com>
 */
class ClientsFactory
{
    private function __construct()
    {
        // It should never be invoked.
    }

    /**
     * HTTP client.
     *
     * @param ClientInterface|string|null $client_type Expected 'curl' or an instance of ClientInterface
     *
     * @return ClientInterface
     */
    public static function createClient($client_type)
    {
        if (!$client_type) {
            return self::defaultClient();
        }

        if ($client_type instanceof ClientInterface) {
            return $client_type;
        }

        switch ($client_type) {
            case 'curl':
                return new CurlClient();

            default:
                throw new InvalidArgumentException('The "http_client_type" only support "curl" or an instance of Spa\Http\ClientInterface');
        }
    }

    /**
     * Default HTTP client.
     *
     * @return ClientInterface
     */
    private static function defaultClient()
    {
        return new CurlClient();
    }

}

//end of script
