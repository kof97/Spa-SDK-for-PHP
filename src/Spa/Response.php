<?php 

namespace Spa;

use Spa\Exceptions\SpaSDKException;

/**
 * Class Response
 *
 * @category PHP
 * @package  Spa
 * @author	 Arno <arnoliu@tencent.com>
 */
class Response {

	/**
	 * @var int The response HTTP status code.
	 */
	protected $httpStatusCode;

	/**
	 * @var array The response headers.
	 */
	protected $headers;

	/**
	 * @var string The response body.
	 */
	protected $body;

	/**
	 * @var Request The original request that returned this response.
	 */
	protected $request;

	/**
	 * Create a new Response entity.
	 *
	 * @param Request		$request
	 * @param array|array()	$headers
	 * @param string|null	$body
	 * @param int|null		$http_status_code
	 */
	public function __construct(Request $request, $headers = array(), $body = null, $http_status_code = null) {
		$this->request = $request;
		$this->headers = $headers;
		$this->body = json_encode($body);
		$this->httpStatusCode = $http_status_code;
	}

	/**
	 * Return the original request.
	 *
	 * @return Request
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * Return the App entity.
	 *
	 * @return App
	 */
	public function getApp() {
		return $this->request->getApp();
	}

	/**
	 * Return the access token.
	 *
	 * @return string|null
	 */
	public function getAccessToken() {
		return $this->request->getAccessToken();
	}

	/**
	 * Return the response HTTP status code.
	 *
	 * @return int
	 */
	public function getHttpStatusCode() {
		return $this->httpStatusCode;
	}

	/**
	 * Return the response headers.
	 *
	 * @return array
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * Return the response body.
	 *
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}

}

//end of script
