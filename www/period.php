<?php

include_once __DIR__.'/_init.php';

$tarif      = $_GET[ 'tarif' ];
$pay_period = $_GET[ 'pay_period' ];

runController(function () use ($tarif, $pay_period)
{
	\SkyNet\Controller\Period::index($tarif, $pay_period);
});
