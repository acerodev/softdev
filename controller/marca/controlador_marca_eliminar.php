<?php 

	require '../../model/modelo_marca.php';
	$MMA = new Modelo_Marca();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');	
	$consulta = $MMA->Eliminar_Marca($id);//llamamos al metodo del modelo
	echo $consulta;

 ?>