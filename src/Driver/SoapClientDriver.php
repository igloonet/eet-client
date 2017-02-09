<?php

namespace SlevomatEET\Driver;

interface SoapClientDriver
{

	/**
	 * @param string $request
	 * @param string $location
	 * @param string $action
	 * @param int $soapVersion
	 * @return string
	 */
	public function send($request, $location, $action, $soapVersion);

}
