<?php 

	require_once '../models/ProductsModel.php';


/**Контроллер продуктов*/


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
		echo 'Такого товара не найдено!';
	}
}

?>