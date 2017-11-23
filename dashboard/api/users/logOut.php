<?php
	session_start();
	$output = array();

    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['fullname']) && isset($_SESSION['usertype']))
  	{
		session_unset();
		session_destroy();
		$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
		$serverName = $_SERVER['SERVER_NAME'];

		$output[] = array('success' => true,
						  'message' => 'Se ha cerrado sesión correctamente!',
						  'redirect' => $serverProtocol .'://'. $serverName .'/PW-Project17/dashboard/');
		echo json_encode($output);
	}
	else
	{
		echo '<script>window.location.href = "../../"</script>';
	}

?>