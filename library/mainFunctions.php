<?php 

	/**Функция вызывает метод контроллера для загрузки страницы*/

	function loadPage($controllerName, $actionName) {
		require_once CONTROLLER_PATH_PREFIX.$controllerName.CONTROLLER_PATH_POSTFIX;

		$funcName = $actionName.'Action';

		$funcName();
	}

	/**Загружает шаблон страницы*/
	function loadTemplate($templateName, $context = array()) {
		extract($context); //распаковывает массив на переменные
		include TEMPLATE_PATH_PREFIX.$templateName.TEMPLATE_PATH_POSTFIX;
	}

	/**
	 * функция-помощник для нахождения ошибок
	 */
	function d($value = null, $die = 1) {

		function debugOut($a) {
			echo "<br><b>".basename($a['file'])."</b>"
				."&nbsp;<font color = 'red'> ({$a['line']}) </font>"
				."&nbsp;<font color = 'green'> {$a['function']}() </font>"
				."&nbsp; -- ". dirname($a['file']);
		}

		echo "<pre>";
			$trace = debug_backtrace();
			array_walk($trace, 'debugOut');
			echo "\n\n";
			print_r($value);
		echo "</pre>";

		if ($die) die;

	}




?>