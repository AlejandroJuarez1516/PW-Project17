<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM places WHERE place = ?";
	$params = array($jsonObject->place);
	$places = Database::getRow($sql, $params);
	
	if ($places['count'] == 0) {
		$sql = "INSERT INTO places (place, description, image) VALUES (?,?,?)";
		$params = array($jsonObject->place, $jsonObject->description, $jsonObject->image);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡Se ha ingresado un lugar a la base de datos!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un lugar con ese nombre!');
	}

	echo json_encode($output);

?>

