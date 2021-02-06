<?php

namespace SkyNet\Model;

use SkyNet\Entity\Tarif;

class Tarifs
{
	/**
	 * @return Tarif[]
	 * @throws \Exception
	 */
	public static function getAll()
	{
		$json = file_get_contents('http://sknt.ru/job/frontend/data.json');
		if ($json === false) {
			throw new \Exception('Error get json');
		}

		$data = json_decode($json, true);
		if ($data === false) {
			throw new \Exception('Error decode json');
		}

		if ($data['result'] !== 'ok') {
			throw new \Exception('Result must be "ok" ("ok" !== "'.$data['result'].'")');
		}

		$tarifs = [];

		foreach ($data['tarifs'] as $tarif_array)
		{
			$tarif_url_id = $tarif_array[ 'title' ];

			$tarifs[$tarif_url_id] = Tarif::createFromArray($tarif_array);
		}

		return $tarifs;
	}
}