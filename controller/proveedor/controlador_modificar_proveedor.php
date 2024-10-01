<?php 

	require '../../model/modelo_proveedor.php';
	$MPRV = new Modelo_Proveedor();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$ruc= htmlspecialchars($_POST['ruc'],ENT_QUOTES,'UTF-8');
	$razon= htmlspecialchars($_POST['razon'],ENT_QUOTES,'UTF-8');
	$direccion= htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
	$celular= htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');


	$consulta = $MPRV->Modificar_Proveedor($id,$ruc,$razon,$direccion,$celular,$estado);//llamamos al metodo del modelo
	echo $consulta;

 ?>