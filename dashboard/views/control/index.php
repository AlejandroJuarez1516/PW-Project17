<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Dashboard | Panel de administración.</title>
	<?php include('./helpers/styles.php'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('./helpers/navbar.php'); ?>

	<div class="dashboard-content">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card option">
					  <div class="card-body">
					   	<div class="text-center">
					   		<span class="option-image"><i class="fa fa-user" aria-hidden="true"></i></span>
					   		<p>Administrar usuarios.</p>
					   		<a href="#" class="btn btn-outline-dark" style="border-radius: 50%;"><i class="fa fa-check" aria-hidden="true"></i></a>
					   	</div>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card option">
					  <div class="card-body">
					   	<div class="text-center">
					   		<span class="option-image"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
					   		<p>Administrar blog.</p>
					   		<a href="blog.php" class="btn btn-outline-dark" style="border-radius: 50%;"><i class="fa fa-check" aria-hidden="true"></i></a>
					   	</div>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card option">
					  <div class="card-body">
					   	<div class="text-center">
					   		<span class="option-image"><i class="fa fa-play" aria-hidden="true"></i></span>
					   		<p>Administrar videos.</p>
					   		<a href="videos.php" class="btn btn-outline-dark" style="border-radius: 50%;"><i class="fa fa-check" aria-hidden="true"></i></a>
					   	</div>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card option">
					  <div class="card-body">
					   	<div class="text-center">
					   		<span class="option-image"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					   		<p>Administrar lugares.</p>
					   		<a href="#" class="btn btn-outline-dark" style="border-radius: 50%;"><i class="fa fa-check" aria-hidden="true"></i></a>
					   	</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>