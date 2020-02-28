<?php
	session_start();
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array(); //хранит id товаров, лежащих в корзине
	}

	//Подключаем необходимые библиотеки
	require_once '../config/config.php';
	require_once '../library/mainFunctions.php';
	require_once '../config/db.php';

	//К этому моменту строка типа 'index/index' уже преобразована с помощью .htaccess
	//Получаем имя контроллера и определяем его метод.
	$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
	$actionName = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';

	loadPage($controllerName, $actionName); //это функция из ../library/mainFunctions.php
?>