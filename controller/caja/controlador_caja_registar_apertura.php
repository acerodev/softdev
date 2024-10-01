<?php 

    require '../../model/modelo_caja.php';
    $MCAJA = new Modelo_Caja();//instaciamos

	$descripcion= htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
	$monto= htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');

	$consulta = $MCAJA->Registrar_Apertura_caja($descripcion,$monto);//llamamos al metodo del modelo
	echo $consulta;

 ?>