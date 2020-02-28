<?php

	/**Константы для контроллеров*/
	define(CONTROLLER_PATH_PREFIX, '../controllers/');
	define(CONTROLLER_PATH_POSTFIX, 'Controller.php');

	$template = 'default'; //шаблоны - сейчас по умолчанию

	/**Константы для шаблонов*/
	define(TEMPLATE_PATH_PREFIX, "../views/{$template}/");
	define(TEMPLATE_PATH_POSTFIX, '.php');

?>