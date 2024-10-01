<?php 

	require '../../model/modelo_marca.php';
	$MMA = new Modelo_Marca();//instaciamops
	$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
	//$estado= htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');

	$consulta = $MMA->Registrar_Marca($marca);//llamamos al metodo del modelo
	echo $consulta;

 ?>