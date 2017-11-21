<?php 
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}
	$return = false;
	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = '2017/PW-Project17/assets/images/brand_w.png';
	if ($_SERVER['REQUEST_URI'] != "/2017/PW-Project17/dashboard/views/control/") {
		$return = true;
	}
	$username = $_SESSION['fullname'];

?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="navbar-brand text-center" href="#">
  	<img src=<?php echo $serverProtocol . '://' . $serverName . '/'. $url; ?> alt="brand" width="40" height="40">
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="toggler">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="collapse navbar-collapse container" id="navigation">
	    <ul class="navbar-nav ml-auto">
	    	<?php  if ($return) { ?>
			<li class="nav-item">
				<a class="nav-link" href="index.php"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
			</li>
	    	<?php } ?>
		    <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo explode(" ", $username)[0]; ?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configuración</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#"><i class="fa fa-lock" aria-hidden="true"></i> Cerrar Sesión</a>
		        </div>
		      </li>
	    </ul>
	</div>
</nav>