<?php 

	require '../../model/modelo_motivo.php';
	$MO = new Modelo_Motivo();//instaciamops
	$motivo= htmlspecialchars($_POST['motivo'],ENT_QUOTES,'UTF-8');
	//$estado= htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');

	$consulta = $MO->Registrar_Motivo($motivo);//llamamos al metodo del modelo
	echo $consulta;

 ?>