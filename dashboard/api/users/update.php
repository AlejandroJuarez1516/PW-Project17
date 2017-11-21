<?php 
	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	$sql = "UPDATE users SET name=?, last_name=?, email=?, password=?, user_type=? WHERE id=?";
	$params = array($jsonObject->name, $jsonObject->lastname, $jsonObject->email, $jsonObject->password, $jsonObject->userType, $jsonObject->id);
	Database::executeRow($sql, $params);

	$sql = "SELECT COUNT(*) as users FROM users";
	
	$rows = Database::getRow($sql);
	$output = array("rows" => $rows['users']);
	echo json_encode($output);
?>