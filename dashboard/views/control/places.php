<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	} 

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = 'PW-Project17/assets/images/';

	$noImage = $serverProtocol . '://' . $serverName . '/'. $url .'noImage.jpg';
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
	<div class="places-content">
		<div class="text-center">
			<h3 class="title">Administración de lugares.</h3>
		</div>
		<div class="container">
			<div class="buttons">
			  	<button class="btn btn-outline-secondary" id="btn-places-send"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
			  	<button class="btn btn-outline-secondary" id="btn-places-update"><i class="fa fa-refresh" aria-hidden="true"></i> Modificar</button>
			  	<button class="btn btn-outline-secondary" id="btn-places-delete"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</button>
			  	<button class="btn btn-outline-secondary" id="btn-places-clear"><i class="fa fa-eraser" aria-hidden="true"></i> Limpiar</button>
			</div>	
			<form>
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-md-6">
		  					<div class="form-group">
							    <label for="title">Nombre del lugar:</label>
							    <input type="text" class="form-control" id="place"/>
							    <input type="text" id="id" hidden />
							</div>
							<div class="form-group">
							  	<label for="title">Descripción del lugar:</label>
							    <textarea class="form-control" name="content" id="description" rows="8"></textarea>
							</div>
		  				</div>
		  				<div class="col-md-6">
		  					<button class="btn btn-outline-secondary w-100" id="btn-places-file"><i class="fa fa-camera" aria-hidden="true"></i> Agregar una imagen</button>
		  					<img src="<?php echo $noImage; ?>" class="img-responsive place-img" id="place-img" alt="placeImage" />
							<input type="file" id="file" hidden />
		  				</div>
		  			</div>
		  		</div> 
		  	</form>
		  	<div class="places-table">
			  	<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Lugar</th>
				      <th scope="col">Descripción</th>
				    </tr>
				  </thead>
				  <tbody class="table-place-body"></tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>