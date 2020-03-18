<?php 

	/**
	* Функция вызывает метод контроллера для загрузки страницы
	* @param string $controllerName - имя нужного контроллера
	* @param string $actionName -  имя функции нужного контроллера
	*/
	function loadPage($controllerName, $actionName) {
		//Подключение нужного контроллера
		require_once CONTROLLER_PATH_PREFIX.$controllerName.CONTROLLER_PATH_POSTFIX;

		$funcName = $actionName.'Action';

		$funcName(); //вызов соответствующей функции нужного контроллеры
	}

	/**
	* Загружает шаблон страницы
	*
	* @param string $templateName - имя загружаемого шаблона
	* @param array $context - переменные, которые будут использоваться в шаблоне
	*/
	function loadTemplate($templateName, $context = array()) {
		extract($context); //распаковывает массив на переменные
		include TEMPLATE_PATH_PREFIX.$templateName.TEMPLATE_PATH_POSTFIX;
	}

	/**
	* функция-помощник для нахождения ошибок
	* @param $value - значение, которое необходимо вывести
	* @param int $die - продолжать работу программы после вызова или нет
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
	
	function redirect($url) {
		if (!$url) $url = '/';
		header("Location: $url");
		exit;
	}



?>