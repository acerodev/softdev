<?php 

    require '../../model/modelo_medida.php';
    $MMEDID = new Modelo_Medida();//instaciamos

	$idmedida= htmlspecialchars($_POST['idmedida'],ENT_QUOTES,'UTF-8');
	$descripcion= htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $abreviatura= htmlspecialchars($_POST['abreviatura'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');

	$consulta = $MMEDID->Modificar_Unidad_medida($idmedida,$descripcion,$abreviatura,$estado);//llamamos al metodo del modelo
	echo $consulta;

 ?>