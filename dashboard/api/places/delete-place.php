<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	
	$sql = "DELETE FROM places WHERE id = ?";
	$params = array($jsonObject->id);
	Database::executeRow($sql, $params);
	$output[] = array('success' => true,
					  'message' => '¡Se ha eliminado el lugar!');
	

	echo json_encode($output);

?>

