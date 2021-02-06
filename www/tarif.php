<?php

include_once __DIR__.'/_init.php';

$url_id = $_SERVER['QUERY_STRING'];

runController(function () use ($url_id)
{
	\SkyNet\Controller\Tarif::index($url_id);
});
