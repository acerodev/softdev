<?php 

	require '../../model/modelo_usuario.php';
	$MU = new Modelo_Usuario();//instaciamops
	$consulta = $MU->Listar_select_rol();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>