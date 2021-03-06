<?php

namespace SlevomatEET\Driver;

class GuzzleSoapClientDriver implements SoapClientDriver
{

	const DEFAULT_TIMEOUT = 2.5;
	const HEADER_USER_AGENT = 'PHP';

	/** @var \GuzzleHttp\Client */
	private $httpClient;

	/** @var float */
	private $connectionTimeout;

	/** @var float */
	private $requestTimeout;

	/**
	 * GuzzleSoapClientDriver constructor.
	 * @param \GuzzleHttp\Client $httpClient
	 * @param float $connectionTimeout
	 * @param float $requestTimeout
	 */
	public function __construct(\GuzzleHttp\Client $httpClient, $connectionTimeout = self::DEFAULT_TIMEOUT, $requestTimeout = self::DEFAULT_TIMEOUT)
	{
		$this->httpClient = $httpClient;
		$this->connectionTimeout = $connectionTimeout;
		$this->requestTimeout = $requestTimeout;
	}

	/**
	 * @param string $request
	 * @param string $location
	 * @param string $action
	 * @param int $soapVersion
	 * @return string
	 * @throws DriverRequestFailedException
	 */
	public function send($request, $location, $action, $soapVersion)
	{
		$headers = [
			'User-Agent' => self::HEADER_USER_AGENT,
			'Content-Type' => sprintf('%s; charset=utf-8', $soapVersion === 2 ? 'application/soap+xml' : 'text/xml'),
			'SOAPAction' => $action,
			'Content-Length' => strlen($request),
		];

		$request = new \GuzzleHttp\Psr7\Request('POST', $location, $headers, $request);
		try {
			$httpResponse = $this->httpClient->send($request, [
				\GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
				\GuzzleHttp\RequestOptions::ALLOW_REDIRECTS => false,
				\GuzzleHttp\RequestOptions::CONNECT_TIMEOUT => $this->connectionTimeout,
				\GuzzleHttp\RequestOptions::TIMEOUT => $this->requestTimeout,
			]);

			return (string) $httpResponse->getBody();
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			throw new DriverRequestFailedException($e);
		}
	}

}
