<?php 

    require '../../model/modelo_medida.php';
    $MMEDID = new Modelo_Medida();//instaciamops

	$descripcion= htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
	$abreviatura= htmlspecialchars($_POST['abreviatura'],ENT_QUOTES,'UTF-8');

	$consulta = $MMEDID->Registrar_Unidad_medida($descripcion,$abreviatura);//llamamos al metodo del modelo
	echo $consulta;

 ?>