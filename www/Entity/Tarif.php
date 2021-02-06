<?php 
namespace SkyNet\Entity;

class Tarif 
{
	public $title;
	public $link;
	public $speed;
	public $price_add;
	public $free_options;

	/** @var TarifPeriod[] */
	public $tarif_periods;


	public static function createFromArray($array)
	{
		$tarif = new self();

		$tarif->title        = $array[ 'title' ];
		$tarif->link         = $array[ 'link' ];
		$tarif->speed        = $array[ 'speed' ];
		$tarif->price_add    = $array[ 'price_add' ];

		$tarif->free_options = (array) $array[ 'free_options' ];

		$tarif_periods = $array[ 'tarifs' ];

		foreach ($tarif_periods as $tarif_period) {
			$tarif->tarif_periods[ $tarif_period['pay_period'] ] = TarifPeriod::crateFromArray($tarif_period);
		}

		ksort($tarif->tarif_periods);

		return $tarif;
	}


	public function getUrlId()
	{
		return $this->title;
	}


	/**
	 * Получение все цен за месяц для всех периодов оплаты
	 * @return array
	 */
	public function getAllPricePerMonth()
	{
		$prices = [];
		foreach ($this->tarif_periods as $period)
		{
			$prices[] = $period->getPricePerMonth();
		}

		return $prices;
	}
}