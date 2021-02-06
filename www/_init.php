<?php
function __autoload($class_name)
{
	$class_name = strstr($class_name, '\\');

	$file_path = __DIR__.$class_name.'.php';

	$file_path = str_replace('\\', '/', $file_path);

	require $file_path;
}


function runController(callable $callable)
{
	try {
		$callable();

	} catch (Exception $e)
	{
		header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

		echo 'Ошибка! '.$e->getMessage();
	}
}

