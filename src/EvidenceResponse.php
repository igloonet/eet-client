<?php

namespace SlevomatEET;

class EvidenceResponse
{

	/** @var \stdClass */
	private $rawData;

	/** @var string|null */
	private $uuid;

	/** @var string|null */
	private $bkp;

	/** @var bool */
	private $test;

	/** @var string|null */
	private $fik;

	/** @var \DateTimeImmutable */
	private $responseTime;

	/** @var \SlevomatEET\EvidenceRequest */
	private $evidenceRequest;

	/**
	 * EvidenceResponse constructor.
	 * @param \stdClass $rawData
	 * @param EvidenceRequest $evidenceRequest
	 */
	public function __construct(\stdClass $rawData, EvidenceRequest $evidenceRequest)
	{
		$this->rawData = $rawData;
		$this->uuid = isset($rawData->Hlavicka->uuid_zpravy) ? $rawData->Hlavicka->uuid_zpravy : null;
		if (isset($rawData->Potvrzeni)) {
			$this->fik = $rawData->Potvrzeni->fik;
		}
		$this->bkp = isset($rawData->Hlavicka->bkp) ? $rawData->Hlavicka->bkp : null;
		$this->test = isset($rawData->Potvrzeni->test) ? $rawData->Potvrzeni->test : (isset($rawData->Chyba->test) ? $rawData->Chyba->test : false);
		$this->responseTime = \DateTimeImmutable::createFromFormat(\DateTime::ISO8601, isset($rawData->Hlavicka->dat_prij) ? $rawData->Hlavicka->dat_prij : $rawData->Hlavicka->dat_odmit);
		$this->evidenceRequest = $evidenceRequest;
	}

	/**
	 * @return string
	 * @throws InvalidResponseWithoutFikException
	 */
	public function getFik()
	{
		if (!$this->isValid()) {
			throw new InvalidResponseWithoutFikException($this);
		}

		return $this->fik;
	}

	/**
	 * @return \stdClass
	 */
	public function getRawData()
	{
		return $this->rawData;
	}

	/**
	 * @return string|null
	 */
	public function getUuid()
	{
		return $this->uuid;
	}

	/**
	 * @return string|null
	 */
	public function getBkp()
	{
		return $this->bkp;
	}

	/**
	 * @return bool
	 */
	public function isTest()
	{
		return $this->test;
	}

	/**
	 * @return bool
	 */
	public function isValid()
	{
		return $this->fik !== null;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getResponseTime()
	{
		return $this->responseTime;
	}

	/**
	 * @return EvidenceRequest
	 */
	public function getRequest()
	{
		return $this->evidenceRequest;
	}
}
