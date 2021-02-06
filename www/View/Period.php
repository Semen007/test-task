<?php

use SkyNet\Controller\Period;
use SkyNet\Entity\Tarif;
use SkyNet\Entity\TarifPeriod;
use SkyNet\Helper\Numbers;

/** @var Tarif $tarif */
/** @var TarifPeriod $tarif_period */

?>

<a class="btn_go_back" href="<?= \SkyNet\Controller\Tarif::getUrl($tarif); ?>">
	<i class="icon">
        <img src="./img/back.svg">
	</i>

    <h1 class="name_tarif_period">Выбор тарифа</h1>
</a>

<ul class="price_list_now_tarif">
	<li class="list_price_tarif">

		<div class="info_title ">
			Тариф "<?= $tarif->title ?>"
		</div>
        <i class="icon_next">
            <img src="./img/next.svg">
        </i>
        <div class="b_period_pay">
            <div class="period">
                Период оплаты &ndash;
                <?=
                $tarif_period->pay_period.' '.
                Numbers::getWordForm($tarif_period->pay_period, 'месяц', 'месяца', 'месяцев');
                ?>
            </div>

            <div class="price">
                <?= $tarif_period->getPricePerMonth(); ?> &#8381;/мес
            </div>

            <div class="price_period">
                разовый платеж &ndash; <?= $tarif_period->price ?> &#8381;
            </div>
            <div class="price_period check">
                со счета спишется &ndash; <?= $tarif_period->price ?> &#8381;
            </div>

            <div class="up_to">
                вступает в силу &ndash; сегодня
            </div>
            <div class="up_to ">
                активно до &ndash; <?= $tarif_period->getUpTo()->format('d.m.Y'); ?>
            </div>
        </div>

        <div class="btn_select">
            <button>Выбрать</button>
        </div>


	</li>
</ul>
