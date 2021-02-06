<?php

use SkyNet\Entity\Tarif;
use SkyNet\Entity\TarifPeriod;
use SkyNet\Helper\Numbers;

/** @var Tarif $tarif */
/** @var TarifPeriod[] $tarif_periods */

$price_for_period_one_month = $tarif_periods[1]->getPricePerMonth();
?>

<a class="btn_go_back" href="./">
	<i class="icon" >
        <img src="./img/back.svg">
	</i>
    <h1 class="name_tarif_period">Тариф "<?= $tarif->title; ?>"</h1>
</a>



<div class="price_inform">
    <?php foreach($tarif_periods as $tarif_period): ?>

        <div class="inform_about_price">

            <div class="info_title">
                <?=
                $tarif_period->pay_period.' '.
                Numbers::getWordForm($tarif_period->pay_period, 'месяц', 'месяца', 'месяцев');
                ?>
            </div>

            <a href="<?= \SkyNet\Controller\Period::getUrl($tarif, $tarif_period); ?>" class="link_price">

                <div class="price">
                    <?= $tarif_period->getPricePerMonth(); ?> &#8381;/мес
                </div>
                <i class="icon_next">
                    <img src="./img/next.svg">
                </i>

                <div class="price_period">
                    разовый платёж &ndash; <?= $tarif_period->price ?> &#8381;
                </div>

                <?php
                $pay_period_without_discount = $tarif_period->pay_period * $price_for_period_one_month;

                $discount = $pay_period_without_discount - $tarif_period->price;
                ?>
                <?php if ($discount > 0): ?>

                    <div class="discount">
                        скидка &ndash; <?= $discount ?> &#8381;
                    </div>

                <?php endif; ?>
            </a>

        </div>

    <?php endforeach; ?>

</div>

