<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM videos WHERE name = ? AND id <> ?";
	$params = array($jsonObject->name, $jsonObject->id);
	$videos = Database::getRow($sql, $params);
	
	if ($videos['count'] == 0) {
		$sql = "UPDATE videos SET name = ?, link = ?, description = ? WHERE id = ?";
		$params = array($jsonObject->name, $jsonObject->link, $jsonObject->description, $jsonObject->id);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡El video se ha modificado con exito!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un video con ese nombre!');
	}

	echo json_encode($output);

?>

