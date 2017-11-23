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
	<div class="video-content">
		<div class="text-center">
			<h3 class="title">Administración de videos.</h3>
		</div>
		<div class="container">
			<div class="buttons">
			  	<button class="btn btn-outline-secondary" id="btn-send"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
			  	<button class="btn btn-outline-secondary" id="btn-update"><i class="fa fa-refresh" aria-hidden="true"></i> Modificar</button>
			  	<button class="btn btn-outline-secondary" id="btn-delete"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</button>
			  	<button class="btn btn-outline-secondary" id="btn-clear"><i class="fa fa-eraser" aria-hidden="true"></i> Limpiar</button>
		  	</div>	
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title">Titulo</label>
						<input type="text" class="form-control" id="title"/>
					</div>
					<div class="form-group">
						<label for="link">Enlace del video</label>
						<input type="text" class="form-control" id="link" />
					</div>
					<div class="form-group">
						<label for="description">Descripción</label>
				    	<textarea class="form-control" name="content" id="description" rows="5"></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<iframe class="video" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>