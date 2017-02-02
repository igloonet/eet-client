<?php

namespace SlevomatEET\Cryptography;

class SigningFailedException extends \Exception
{

	/**
	 * @var mixed[]
	 */
	private $data;

	/**
	 * SigningFailedException constructor.
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		parent::__construct('Signing failed');

		$this->data = $data;
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}
}
