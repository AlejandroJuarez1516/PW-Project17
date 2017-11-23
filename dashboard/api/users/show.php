<?php 
	require_once '../../Classes/conexion.php';

	$sql = "SELECT * FROM users"; $params = null;
	//Database::connect();
	//$connection = Database::getConn();
	$result = mysqli_query($conexion,$sql);
	if( !$result ){
		die("Error");
	}else{
		while( $data = mysqli_fetch_assoc($result)){
			$arreglo["data"][] = $data;
		}
		echo json_encode($arreglo);
	}
?>