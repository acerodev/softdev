<?php 

	require '../../model/modelo_motivo.php';
	$MO = new Modelo_Motivo();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$motivo= htmlspecialchars($_POST['motivo'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');

	$consulta = $MO->Modificar_Motivo($id,$motivo,$estado);//llamamos al metodo del modelo
	echo $consulta;

 ?>