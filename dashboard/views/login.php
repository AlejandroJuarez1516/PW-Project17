<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../../assets/css/styles.css">
  	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper">
		<div class="sign-up">
			<div class="container">
				<form action="loginAcces.php" method="post">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 registration-form">							
							<h3 class="form-tittle text-center">Inicie sesión</h3>
							<h4 class="form-text text-justify">Eres único para nuestro departamento, inicia sesión para tratarte como un ciudadano de nuestra capital y recibir 		
							información de eventos y noticias directamente a tu correo eléctronico</h4>
							<div class="form-container">
								<div class="form-group">
									<div class="form-group">
										<label for="email">Correo:</label>
										<input class="form-control" type="text" name="email" required />
									</div>	
								</div>
								<div class="form-group">
									<div class="form-group">
										<label for="password">Contraseña:</label>
										<input class="form-control" type="password" name="password" required />
									</div>	
								</div>
								<div class="text-center">
									<button class="btn btn-outline-secondary" id="btn-send">Entrar</button>
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</form>
			</div>	
		</div>
	</div>
	<script src="../assets/js/jquery.min.css"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>