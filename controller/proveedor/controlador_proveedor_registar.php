<?php 

	require '../../model/modelo_proveedor.php';
	$MPRV = new Modelo_Proveedor();//instaciamops
	$ruc= htmlspecialchars($_POST['ruc'],ENT_QUOTES,'UTF-8');
	$razon= htmlspecialchars($_POST['razon'],ENT_QUOTES,'UTF-8');
	$direccion= htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
	$celular= htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');


	$consulta = $MPRV->Registrar_Proveedor($ruc,$razon,$direccion,$celular);//llamamos al metodo del modelo
	echo $consulta;

 ?>