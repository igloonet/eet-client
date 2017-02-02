<?php

namespace SlevomatEET;

class Configuration
{

	/** @var string */
	private $vatId;

	/** @var string */
	private $premiseId;

	/** @var string */
	private $cashRegisterId;

	/** @var bool */
	private $verificationMode;

	/** @var \SlevomatEET\EvidenceMode */
	private $evidenceMode;

	/** @var \SlevomatEET\EvidenceEnvironment */
	private $evidenceEnvironment;

	/**
	 * Configuration constructor.
	 * @param string $vatId
	 * @param string $premiseId
	 * @param string $cashRegisterId
	 * @param EvidenceEnvironment $evidenceEnvironment
	 * @param bool $verificationMode
	 */
	public function __construct($vatId, $premiseId, $cashRegisterId, EvidenceEnvironment $evidenceEnvironment, $verificationMode = false)
	{
		$this->vatId = $vatId;
		$this->premiseId = $premiseId;
		$this->cashRegisterId = $cashRegisterId;
		$this->evidenceMode = EvidenceMode::get(EvidenceMode::REGULAR);
		$this->verificationMode = $verificationMode;
		$this->evidenceEnvironment = $evidenceEnvironment;
	}

	/**
	 * @return string
	 */
	public function getVatId()
	{
		return $this->vatId;
	}

	/**
	 * @return string
	 */
	public function getPremiseId()
	{
		return $this->premiseId;
	}

	/**
	 * @return string
	 */
	public function getCashRegisterId()
	{
		return $this->cashRegisterId;
	}

	/**
	 * @return bool
	 */
	public function isVerificationMode()
	{
		return $this->verificationMode;
	}

	/**
	 * @return EvidenceMode
	 */
	public function getEvidenceMode()
	{
		return $this->evidenceMode;
	}

	/**
	 * @return EvidenceEnvironment
	 */
	public function getEvidenceEnvironment()
	{
		return $this->evidenceEnvironment;
	}
}
