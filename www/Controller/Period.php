<?php 
namespace SkyNet\Controller;

use SkyNet\Entity\TarifPeriod;
use SkyNet\Helper\Views;
use SkyNet\Model\Tarifs;

class Period
{
	public static function index($tarif_url_id, $pay_period)
	{
		$tarif_url_id = urldecode($tarif_url_id);

		$tarifs = Tarifs::getAll();

		$tarif = $tarifs[$tarif_url_id];

		if (empty($tarif))
		{
			header('HTTP/1.0 404 Not Found', true, 404);

			if (empty($tarif_url_id)) {
				echo 'Тариф не выбран';
			} else {
				echo 'Тариф "'.htmlspecialchars($tarif_url_id).'" не найден';
			}
			return;
		}

		$tarif_period = $tarif->tarif_periods[$pay_period];

		if (empty($tarif_period))
		{
			header('HTTP/1.0 404 Not Found', true, 404);

			if (empty($pay_period)) {
				echo 'Период не выбран';
			} else {
				echo 'Период "'.htmlspecialchars($pay_period).'" не найден';
			}
			return;
		}

		Views::renderMain(
			__DIR__.'/../View/Period.php',
			[
				'tarif' => $tarif,
				'tarif_period' => $tarif_period
			]
		);
	}

	public static function getUrl(\SkyNet\Entity\Tarif $tarif, TarifPeriod $tarif_period)
	{
		return 'period.php?'.
			http_build_query([
				'tarif' => $tarif->getUrlId(),
				'pay_period' => $tarif_period->pay_period
			]);
	}
}