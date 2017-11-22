<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM blogs WHERE title = ? AND id <> ?";
	$params = array($jsonObject->title, $jsonObject->id);
	$blogs = Database::getRow($sql, $params);
	
	if ($blogs['count'] == 0) {
		$sql = "UPDATE blogs SET title = ?, image = ?, content = ? WHERE id = ?";
		$params = array($jsonObject->title, $jsonObject->image, $jsonObject->content, $jsonObject->id);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡El blog se ha modificado con exito!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un blog con ese titulo!');
	}

	echo json_encode($output);

?>

