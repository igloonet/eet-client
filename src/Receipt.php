<?php

namespace SlevomatEET;

class Receipt
{

	/**
	 * XML uuid_zpravy
	 *
	 * @var \Ramsey\Uuid\UuidInterface
	 */
	private $uuid;

	/**
	 * XML prvni_zaslani
	 *
	 * @var bool
	 */
	private $firstSend = true;

	/**
	 * XML dic_poverujiciho
	 *
	 * @var string|null
	 */
	private $delegatedVatId;

	/**
	 * XML porad_cis
	 *
	 * @var string
	 */
	private $receiptNumber;

	/**
	 * XML dat_trzby
	 *
	 * @var \DateTimeImmutable
	 */
	private $receiptTime;

	/**
	 * XML celk_trzba
	 *
	 * @var int
	 */
	private $totalPrice;

	/**
	 * XML zakl_nepodl_dph
	 *
	 * @var int|null
	 */
	private $priceZeroVat;

	/**
	 * XML zakl_dan1
	 *
	 * @var int|null
	 */
	private $priceStandardVat;

	/**
	 * XML dan1
	 *
	 * @var int|null
	 */
	private $vatStandard;

	/**
	 * XML zakl_dan2
	 *
	 * @var int|null
	 */
	private $priceFirstReducedVat;

	/**
	 * XML dan2
	 *
	 * @var int|null
	 */
	private $vatFirstReduced;

	/**
	 * XML zakl_dan3
	 *
	 * @var int|null
	 */
	private $priceSecondReducedVat;

	/**
	 * XML dan3
	 *
	 * @var int|null
	 */
	private $vatSecondReduced;

	/**
	 * XML cest_sluz
	 *
	 * @var int|null
	 */
	private $priceTravelService;

	/**
	 * XML pouzit_zboz1
	 *
	 * @var int|null
	 */
	private $priceUsedGoodsStandardVat;

	/**
	 * XML pouzit_zboz2
	 *
	 * @var int|null
	 */
	private $priceUsedGoodsFirstReduced;

	/**
	 * XML pouzit_zboz3
	 *
	 * @var int|null
	 */
	private $priceUsedGoodsSecondReduced;

	/**
	 * XML urceno_cerp_zuct
	 *
	 * @var int|null
	 */
	private $priceForSubsequentSettlement;

	/**
	 * XML cerp_zuct
	 *
	 * @var int|null
	 */
	private $priceUsedSubsequentSettlement;

	/**
	 * Receipt constructor.
	 * @param bool $firstSend
	 * @param string|null $delegatedVatId
	 * @param string $receiptNumber
	 * @param \DateTimeImmutable $receiptTime
	 * @param int $totalPrice
	 * @param int|null $priceZeroVat
	 * @param int|null $priceStandardVat
	 * @param int|null $vatStandard
	 * @param int|null $priceFirstReducedVat
	 * @param int|null $vatFirstReduced
	 * @param int|null $priceSecondReducedVat
	 * @param int|null $vatSecondReduced
	 * @param int|null $priceTravelService
	 * @param int|null $priceUsedGoodsStandardVat
	 * @param int|null $priceUsedGoodsFirstReduced
	 * @param int|null $priceUsedGoodsSecondReduced
	 * @param int|null $priceSubsequentSettlement
	 * @param int|null $priceUsedSubsequentSettlement
	 */
	public function __construct(
		$firstSend,
		$delegatedVatId = null,
		$receiptNumber,
		\DateTimeImmutable $receiptTime,
		$totalPrice = 0,
		$priceZeroVat = null,
		$priceStandardVat = null,
		$vatStandard = null,
		$priceFirstReducedVat = null,
		$vatFirstReduced = null,
		$priceSecondReducedVat = null,
		$vatSecondReduced = null,
		$priceTravelService = null,
		$priceUsedGoodsStandardVat = null,
		$priceUsedGoodsFirstReduced = null,
		$priceUsedGoodsSecondReduced = null,
		$priceSubsequentSettlement = null,
		$priceUsedSubsequentSettlement = null
	)
	{
		$this->uuid = \Ramsey\Uuid\Uuid::uuid4();
		$this->firstSend = $firstSend;
		$this->delegatedVatId = $delegatedVatId;
		$this->receiptNumber = $receiptNumber;
		$this->receiptTime = $receiptTime;
		$this->totalPrice = $totalPrice;
		$this->priceZeroVat = $priceZeroVat;
		$this->priceStandardVat = $priceStandardVat;
		$this->vatStandard = $vatStandard;
		$this->priceFirstReducedVat = $priceFirstReducedVat;
		$this->vatFirstReduced = $vatFirstReduced;
		$this->priceSecondReducedVat = $priceSecondReducedVat;
		$this->vatSecondReduced = $vatSecondReduced;
		$this->priceTravelService = $priceTravelService;
		$this->priceUsedGoodsStandardVat = $priceUsedGoodsStandardVat;
		$this->priceUsedGoodsFirstReduced = $priceUsedGoodsFirstReduced;
		$this->priceUsedGoodsSecondReduced = $priceUsedGoodsSecondReduced;
		$this->priceForSubsequentSettlement = $priceSubsequentSettlement;
		$this->priceUsedSubsequentSettlement = $priceUsedSubsequentSettlement;
	}

	/**
	 * @return \Ramsey\Uuid\UuidInterface
	 */
	public function getUuid()
	{
		return $this->uuid;
	}

	/**
	 * @return bool
	 */
	public function isFirstSend()
	{
		return $this->firstSend;
	}

	/**
	 * @return null|string
	 */
	public function getDelegatedVatId()
	{
		return $this->delegatedVatId;
	}

	/**
	 * @return string
	 */
	public function getReceiptNumber()
	{
		return $this->receiptNumber;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getReceiptTime()
	{
		return $this->receiptTime;
	}

	/**
	 * @return int
	 */
	public function getTotalPrice()
	{
		return $this->totalPrice;
	}

	/**
	 * @return int|null
	 */
	public function getPriceZeroVat()
	{
		return $this->priceZeroVat;
	}

	/**
	 * @return int|null
	 */
	public function getPriceStandardVat()
	{
		return $this->priceStandardVat;
	}

	/**
	 * @return int|null
	 */
	public function getVatStandard()
	{
		return $this->vatStandard;
	}

	/**
	 * @return int|null
	 */
	public function getPriceFirstReducedVat()
	{
		return $this->priceFirstReducedVat;
	}

	/**
	 * @return int|null
	 */
	public function getVatFirstReduced()
	{
		return $this->vatFirstReduced;
	}

	/**
	 * @return int|null
	 */
	public function getPriceSecondReducedVat()
	{
		return $this->priceSecondReducedVat;
	}

	/**
	 * @return int|null
	 */
	public function getVatSecondReduced()
	{
		return $this->vatSecondReduced;
	}

	/**
	 * @return int|null
	 */
	public function getPriceTravelService()
	{
		return $this->priceTravelService;
	}

	/**
	 * @return int|null
	 */
	public function getPriceUsedGoodsStandardVat()
	{
		return $this->priceUsedGoodsStandardVat;
	}

	/**
	 * @return int|null
	 */
	public function getPriceUsedGoodsFirstReduced()
	{
		return $this->priceUsedGoodsFirstReduced;
	}

	/**
	 * @return int|null
	 */
	public function getPriceUsedGoodsSecondReduced()
	{
		return $this->priceUsedGoodsSecondReduced;
	}

	/**
	 * @return int|null
	 */
	public function getPriceForSubsequentSettlement()
	{
		return $this->priceForSubsequentSettlement;
	}

	/**
	 * @return int|null
	 */
	public function getPriceUsedSubsequentSettlement()
	{
		return $this->priceUsedSubsequentSettlement;
	}
}
