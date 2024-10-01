<?php 

	require '../../model/modelo_marca.php';
	$MMA = new Modelo_Marca();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');

	$consulta = $MMA->Modificar_Marca($id,$marca,$estado);//llamamos al metodo del modelo
	echo $consulta;

 ?>