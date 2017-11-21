<?php 
	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	$sql = "INSERT INTO users (name, last_name, email, password, user_type) VALUES (?,?,?,?,?)";
	$params = array($jsonObject->name, $jsonObject->lastname, $jsonObject->email, md5($jsonObject->password), 1);

	Database::executeRow($sql, $params);

	$sql = "SELECT COUNT(*) as users FROM users";
	$rows = Database::getRow($sql);

	$output = array("rows" => $rows['users']);
	echo json_encode($output);
?>