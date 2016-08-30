<?php 

namespace Tsa\Http;

/**
 * interface ClientInterface
 *
 * @category PHP
 * @package  Tsa
 * @author   Arno <arnoliu@tencent.com>
 */
interface ClientInterface
{
    /**
     * Sends a request to the server and returns the response.
     *
     * @param string $url      The endpoint to send the request to.
     * @param string $method   The request method.
     * @param string $params   The params of the request.
     * @param array  $headers  The request headers.
     * @param int    $time_out The timeout in seconds for the request.
     *
     * @return ReponseAnalyzer response from the server.
     */
    public function send($url, $method, $params, array $headers, $time_out);

}

//end of script
