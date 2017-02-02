<?php

namespace SlevomatEET\Cryptography;

class PrivateKeyFileException extends \Exception
{

	/**
	 * @var string
	 */
	private $privateKeyFile;

	/**
	 * PrivateKeyFileException constructor.
	 * @param string $privateKeyFile
	 * @param \Throwable|null $previous
	 */
	public function __construct($privateKeyFile, \Throwable $previous = null)
	{
		parent::__construct(sprintf(
			'Private key could not be loaded from file \'%s\'. Please make sure that the file contains valid private key in PEM format.',
			$privateKeyFile
		), 0, $previous);

		$this->privateKeyFile = $privateKeyFile;
	}

	/**
	 * @return string
	 */
	public function getPrivateKeyFile()
	{
		return $this->privateKeyFile;
	}
}
