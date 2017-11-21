<?php 
	require_once '../../classes/database.php';
	session_start();
	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT id, CONCAT(name, ' ', last_name) AS fullname, email, user_type FROM users WHERE email = ? AND password = ?";
	$params = array($jsonObject->email, md5($jsonObject->password));

	$user = Database::getRow($sql, $params);

	if (count($user) > 0) {

		$_SESSION['user'] = $user['email'];
		$_SESSION['fullname'] = $user['fullname'];
		$_SESSION['id'] = $user['id'];
		$_SESSION['usertype'] = $user['user_type'];

		$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
		$serverName = $_SERVER['SERVER_NAME'];
		$url = '2017/PW-Project17/dashboard/views/control';

		$redirect = $serverProtocol . '://' . $serverName . '/'. $url;

		$output[] = array (
			"fullname" => $user['fullname'],
			"usertype" => $user['user_type'],
			"redirect" => $redirect,
			"success" => true
		);
	} else {
		$output[] = array(
			"error" => true,
			"message" => "¡Datos incorrectos!"
		);
	}

	echo json_encode($output);
?>