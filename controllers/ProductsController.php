<?php 

/**
* Контроллер продуктов. Формирует страницу необходимого продукта
*/

//Подключение необходимых моделей
require_once '../models/ProductsModel.php';

/**
* Формирует страницу необходимого продукта
*/
function indexAction() {
	$id = isset($_GET['id']) ? intval($_GET['id']) : null;
	if ($id) {
		$product = getProductById($id);

		if ($product) {
			loadTemplate('header');	
			loadTemplate('product', ['product' => $product]);
			loadTemplate('footer');
		}
	} else {
		echo 'Такого товара не найдено!'; //FIXME - СТОИТ СФОРМИРОВАТЬ ШАБЛОН
	}
}

?>