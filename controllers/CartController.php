<?php 

	require_once '../models/ProductsModel.php';

/*Контроллер корзины*/



/**
*	Формирует страницу корзины
*/
function indexAction() {
	$cartProducts = getProductFromCartArray($_SESSION['cart']);

	loadTemplate('header');
	loadTemplate('cart', ['cartProducts' => $cartProducts]);
	loadTemplate('footer');
}



/**
*	Добавляет продукт с указанным id в корзину
*/
function addtocartAction() {
	$resData = array(); //результат, который будет отправлен в формате json
	$productId = isset($_GET['id']) ? intval($_GET['id']) : null;

	if (! $productId) return false;

	if (isset($_SESSION['cart']) && array_search($productId, $_SESSION['cart']) === false) {
		$_SESSION['cart'][] = $productId;
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка при добавлении товара в корзину';
	}

	echo json_encode($resData);
	return;
}

/**
*	Удаляет продукт с указанным id из корзины
*/
function removefromcartAction() {
	$resData = array(); //результат, который будет отправлен в формате json
	$productId = isset($_GET['id']) ? intval($_GET['id']) : null;

	if (! $productId) return false;

	$key = array_search($productId, $_SESSION['cart']);
	if (isset($_SESSION['cart']) && array_search($productId, $_SESSION['cart']) !== false) {
		unset($_SESSION['cart'][$key]);
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка при добавлении товара в корзину';
	}

	echo json_encode($resData);
	return;
}







?>