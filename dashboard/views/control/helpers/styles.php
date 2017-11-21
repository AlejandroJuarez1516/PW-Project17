<?php 
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = '2017/PW-Project17/assets/css/';

	$bootstrap = $serverProtocol . '://' . $serverName . '/'. $url .'bootstrap.min.css';
	$styles = $serverProtocol . '://' . $serverName . '/'. $url .'styles.css';
	$dashboard = $serverProtocol . '://' . $serverName . '/'. $url .'dashboard.css';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href=<?php echo $bootstrap; ?>>
<link rel="stylesheet" href=<?php echo $styles; ?>>
<link rel="stylesheet" href=<?php echo $dashboard; ?>>