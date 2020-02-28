<?php
	session_start();
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	//Подключаем необходимые библиотеки
	require_once '../config/config.php';
	require_once '../library/mainFunctions.php';
	require_once '../config/db.php';

	$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
	$actionName = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';


	loadPage($controllerName, $actionName);
?>