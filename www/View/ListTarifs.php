<?php

use SkyNet\Entity\Tarif;

/** @var Tarif[] $tarifs */


/**
 * @var int $counter
 */
?>

<ul class="list_tarifs   ">
    <?php foreach($tarifs as $url_id => $tarif): ?>
        <?php  $counter++ ?>
		<li class="block_list ">
			<div class="info_title">
				<h3 class="name_tarif">Тариф "<?= $tarif->title; ?>"</h3>
			</div>

           <a href="<?= \SkyNet\Controller\Tarif::getUrl($tarif); ?>" class="link_description<?=$counter?> link_description  ">
               <i class="icon_next">
                   <img src="./img/next.svg">
               </i>
               <div class="b_description_list_tarif">

                    <div class="speed">
                        <?= $tarif->speed; ?> Мбит/c
                    </div>

                    <div class="price">
                        <?php
                        $prices = $tarif->getAllPricePerMonth();

                        $price_min = min($prices);
                        $price_max = max($prices);
                        ?>
                        <?= $price_min ?> - <?= $price_max ?> &#8381/месяц
                    </div>



                    <div class="options">

                        <ul class="list_options">
                            <?php foreach($tarif->free_options as $free_option): ?>

                                <li>
                                    <?= $free_option; ?>
                                </li>

                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>



           </a>

           <div class="b_link_about">
               <a href="<?= $tarif->link?>" class="link_about">
                   узанать подробнее на сайте www.sknt.ru
               </a>
           </div>
       </li>

    <?php endforeach; ?>
</ul>


