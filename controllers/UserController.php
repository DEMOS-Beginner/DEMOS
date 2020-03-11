<?php 

/**
*
* Занимается всеми действиями с пользователем и выводит его страницу
*
*/

//Подключение необходимых библиотек
require_once "../models/UsersModel.php";






/*
* Регистрация нового пользователя
*/
function registerAction() {
	$resData = ['success' => 1];

	$userName = isset($_POST['userName']) ? $_POST['userName'] : null;
	$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : null;
	$userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : null;

	if (strlen($userName) < 5) $resData['message'] = 'Слишком короткое имя';
	if (strlen($userPassword) < 5) $resData['message'] = 'Слишком короткий пароль';
	if (!$userName || !$userEmail || !$userPassword) $resData['message'] = 'Заполнены не все поля!';
	if (checkUserEmail($userEmail)) {
		$resData['message'] = 'Пользователь с таким email уже зарегистрирован';
	}

	if ($resData['message']) {
		$resData['success'] = 0;
		echo json_encode($resData);
		return;
	}

	$rs = registerNewUser($userName, $userEmail, $userPassword);
	if ($rs) {
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка при регистрации';
	}

	echo json_encode($resData);
	return;
}


/**
* Авторизация пользователя
*/

function loginAction() {
	$resData = ['success' => 1];

	$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : null;
	$userNumber = isset($_POST['userNumber']) ? $_POST['userNumber'] : null;
	$userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : null;

	if (!(($userEmail xor $userNumber) && $userPassword)) {
		if (!$userPassword) $resData['message'] = 'Введите пароль!';
		else $resData['message'] = 'Введите или email или номер!';
		$resData['success'] = 0;
		echo json_encode($resData);
		return;
	}

	if ($userEmail) $userData = loginUser($userPassword, $userEmail);
	else if ($userNumber) $userData = loginUser($userPassword, '', $userEmail);
	if ($userData) {
		$_SESSION['user'] = $userData;

		$resData = $userData;
		$resData['success'] = 1;
		$resData['message'] = 'Вы успешно вошли';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Введены неверные данные';
	}
	echo json_encode($resData);
	return;		

}







?>