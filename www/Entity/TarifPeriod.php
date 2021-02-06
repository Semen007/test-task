<?php 
namespace SkyNet\Entity;

class TarifPeriod
{
	public $ID;
	public $title;
	public $price;
	public $price_add;
	public $pay_period;
	public $new_payday;
	public $speed;

	public static function crateFromArray($array)
	{
		$period = new self();

		$period->ID         = $array[ 'ID' ];
		$period->title      = $array[ 'title' ];
		$period->price      = $array[ 'price' ];
		$period->price_add  = $array[ 'price_add' ];
		$period->pay_period = $array[ 'pay_period' ];
		$period->new_payday = $array[ 'new_payday' ];
		$period->speed      = $array[ 'speed' ];

		return $period;
	}

	public function getPricePerMonth()
	{
		return $this->price / $this->pay_period;
	}

	public function getUpTo()
	{
		$dt = new \DateTime();

		list($timestamp, $timezone_offset) = explode('+', $this->new_payday);

		$dt->setTimestamp($timestamp);
		$dt->setTimezone(new \DateTimeZone('+'.$timezone_offset));

		return $dt;
	}
}