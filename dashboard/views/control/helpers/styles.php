<?php 
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = 'PW-Project17/assets/css/';

	$bootstrap = $serverProtocol . '://' . $serverName . '/'. $url .'bootstrap.min.css';
	$styles = $serverProtocol . '://' . $serverName . '/'. $url .'styles.css';
	$dashboard = $serverProtocol . '://' . $serverName . '/'. $url .'dashboard.css';
	$userStyle = $serverProtocol . '://' . $serverName . '/'. $url .'usuarioStyle.css';
	$dataTable = $serverProtocol . '://' . $serverName . '/'. $url .'dataTables.bootstrap.min.css';

	$dashboard = $serverProtocol . '://' . $serverName . '/'. $url .'cpanel.css';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" href=<?php echo $dashboard; ?>>
<link rel="stylesheet" href=<?php echo $dataTable; ?>>
<link rel="stylesheet" href=<?php echo $userStyle; ?>>
<link rel="stylesheet" href=<?php echo $styles; ?>>