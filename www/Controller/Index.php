<?php 
namespace SkyNet\Controller;

use SkyNet\Helper\Views;
use SkyNet\Model\Tarifs;

class Index
{
	public static function index()
	{
		$tarifs = Tarifs::getAll();

		Views::renderMain(
			__DIR__.'/../View/ListTarifs.php',
			[
				'tarifs' => $tarifs
			]
		);
	}
}