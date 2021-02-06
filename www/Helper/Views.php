<?php 
namespace SkyNet\Helper;

class Views
{
	public static function renderMain($__file_path, $__data = [])
	{
		$content = Views::render($__file_path, $__data);

		if (
				! empty($_SERVER['HTTP_X_REQUESTED_WITH'])
			&&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
		) {
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");

			echo $content;

		} else {
			echo Views::render(
				__DIR__.'/../View/Main.php',
				[
					'content' => $content
				]
			);
		}
	}

	public static function render($__file_path, $__data = [])
	{
		ob_start();

		extract($__data);

		include $__file_path;

		$view = ob_get_clean();

		return $view;
	}
}