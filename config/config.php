<?php

/**
*
* Главный конфигурационный файл проекта
*
*/




	//Константы для контроллеров
	define(CONTROLLER_PATH_PREFIX, '../controllers/'); //префикс для пути к контроллеру
	define(CONTROLLER_PATH_POSTFIX, 'Controller.php'); //тип файлов

	$template = 'default'; //шаблоны - сейчас по умолчанию

	//Константы для шаблонов
	define(TEMPLATE_PATH_PREFIX, "../views/{$template}/"); //префикс для пути к шаблону
	define(TEMPLATE_PATH_POSTFIX, '.php'); //тип файлов

?>