<?php 


/**
*
* Модель для обращения к таблице пользователей
*
*/


/**
* Заносит данные нового пользователя в базу данных
*
* @param string $name - имя пользователя
* @param string $email - email пользователя
* @param string $password - пароль пользователя
*/
function registerNewUser($name, $email, $password) {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции

	$sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
	$query = $pdo->prepare($sql);
	$rs = $query->execute(array('name'=>$name, 'email'=>$email, 'password' => $password));

	return $rs;
}



/**
* Проверяет, не записан ли такой email уже
*
* @param string $email - email
*/
function checkUserEmail($email) {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции

	$sql = 'SELECT * FROM users WHERE email = :email';
	$query = $pdo->prepare($sql);
	$query->execute(array('email'=>$email));	
	$rs = $query->fetch();

	return $rs;
}
 

/**
* Логинит пользователя
*
* @param string $email - email
* @param string $password - пароль пользователя
* @param string $number - номер телефона пользователя
*/
function loginUser($password, $email = '', $number = '') {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции
	$arr = ['password'=>$password];
	if ($email) {
		$code = ' AND email = :email';
		$arr['email'] = $email;
	} else if ($number) {
		$code = ' AND number = :number';
		$arr['number'] = $number;
	}

	$sql = 'SELECT * FROM users WHERE password = :password';
	$sql .= $code;
	$query = $pdo->prepare($sql);
	$query->execute($arr);	
	$rs = $query->fetch();

	return $rs;	
}




?>