<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM places WHERE place = ? AND id <> ?";
	$params = array($jsonObject->place, $jsonObject->id);
	$blogs = Database::getRow($sql, $params);
	
	if ($blogs['count'] == 0) {
		$sql = "UPDATE places SET place = ?, image = ?, description = ? WHERE id = ?";
		$params = array($jsonObject->place, $jsonObject->image, $jsonObject->description, $jsonObject->id);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡El lugar se ha modificado con exito!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un lugar con ese nombre!');
	}

	echo json_encode($output);

?>

