<?php 	
	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	$sql = "INSERT INTO users (name, lastname, email, password, usertype) VALUES (?,?,?,?,?)";
	$params = array($jsonObject->name, $jsonObject->lastname, $jsonObject->email, $jsonObject->password, $jsonObject->userType);
	Database::executeRow($sql, $params);

	$sql = "SELECT COUNT(*) as users FROM users";
	
	$rows = Database::getRow($sql);
	$output = array("rows" => $rows['users']);
	echo json_encode($output);
?>