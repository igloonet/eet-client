<?php

namespace SlevomatEET;

class Formatter
{

	/**
	 * @param \DateTimeImmutable $value
	 * @return string
	 */
	public static function formatDateTime(\DateTimeImmutable $value)
	{
		return $value->format('c');
	}

	/**
	 * @param int|null $price
	 * @return string|null
	 */
	public static function formatAmount($price = null)
	{
		return $price === null ? null : number_format($price / 100, 2, '.', '');
	}
}
