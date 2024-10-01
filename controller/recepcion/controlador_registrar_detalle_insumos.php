<?php 

require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.

	$idrecep= htmlspecialchars($_POST['idrecep'],ENT_QUOTES,'UTF-8');
	$insu_ins= htmlspecialchars($_POST['insu_ins'],ENT_QUOTES,'UTF-8');
	$cant_ins= htmlspecialchars($_POST['cant_ins'],ENT_QUOTES,'UTF-8');
    $mont_ins= htmlspecialchars($_POST['mont_ins'],ENT_QUOTES,'UTF-8');
	$idusu_ins= htmlspecialchars($_POST['idusu_ins'],ENT_QUOTES,'UTF-8');
	
	

	$array_idinsumo=  explode(",", $insu_ins);
    $array_catidad_i=  explode(",", $cant_ins);
    $array_mont_ins=  explode(",", $mont_ins);

   
	
	for($i=0; $i < count($array_idinsumo);$i++){
		$consulta = $MREC->Registrar_Detalle_Insumos_recep($idrecep, $array_idinsumo[$i],$array_catidad_i[$i],$array_mont_ins[$i], $idusu_ins);//llamamos al metodo del modelo
	}

	echo $consulta;

 ?>