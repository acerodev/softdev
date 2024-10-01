<?php 

	require '../../model/modelo_medida.php';
	$MMEDID = new Modelo_Medida();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');	
	$consulta = $MMEDID->Eliminar_UMedida($id);//llamamos al metodo del modelo
	echo $consulta;