<?php

namespace SlevomatEET;

class InvalidResponseReceivedException extends \Exception
{

	/** @var \SlevomatEET\EvidenceResponse */
	private $response;

	/**
	 * InvalidResponseReceivedException constructor.
	 * @param EvidenceResponse $response
	 * @param \Throwable|null $previous
	 */
	public function __construct(EvidenceResponse $response, \Throwable $previous = null)
	{
		parent::__construct(sprintf('Invalid response received. Check response data for errors and warnings.'), 0, $previous);
		$this->response = $response;
	}

	/**
	 * @return EvidenceResponse
	 */
	public function getResponse()
	{
		return $this->response;
	}
}
