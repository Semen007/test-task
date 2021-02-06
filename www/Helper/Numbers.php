<?php 
namespace SkyNet\Helper;

class Numbers
{
	/**
	 * Получение слова зависящего от числа перед ним в нужной форме
	 * @param int $num
	 * @param string $form_for_1
	 * @param string $form_for_2
	 * @param string $form_for_5
	 * @return string
	 */
	public static function getWordForm($num, $form_for_1, $form_for_2, $form_for_5)
	{
		$num 	= abs($num) % 100;
		$num_x 	= $num % 10;

		if ($num > 10 && $num < 20)
			return $form_for_5;

		if ($num_x > 1 && $num_x < 5)
			return $form_for_2;

		if ($num_x == 1) {
			return $form_for_1;
		}

		return $form_for_5;
	}
}