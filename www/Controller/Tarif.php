<?php 
namespace SkyNet\Controller;

use SkyNet\Helper\Views;
use SkyNet\Model\Tarifs;

class Tarif
{
	public static function index($url_id)
	{
		$url_id = urldecode($url_id);

		$tarifs = Tarifs::getAll();

		$tarif = $tarifs[$url_id];

		if (empty($tarif))
		{
			header('HTTP/1.0 404 Not Found', true, 404);

			if (empty($url_id)) {
				echo 'Тариф не выбран';
			} else {
				echo 'Тариф "'.htmlspecialchars($url_id).'" не найден';
			}
			return;
		}

		Views::renderMain(
			__DIR__.'/../View/ListPeriods.php',
			[
				'tarif' => $tarif,
				'tarif_periods' => $tarif->tarif_periods
			]
		);
	}


	public static function getUrl(\SkyNet\Entity\Tarif $tarif)
	{
		return "tarif.php?".urlencode($tarif->getUrlId());
	}
}