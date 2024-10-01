<?php 

	
require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.

	$idinsumo_dele= htmlspecialchars($_POST['idinsumo_dele'],ENT_QUOTES,'UTF-8');
    $canti_dele= htmlspecialchars($_POST['canti_dele'],ENT_QUOTES,'UTF-8');
    $produc_dele= htmlspecialchars($_POST['produc_dele'],ENT_QUOTES,'UTF-8');
    $idrece_dele= htmlspecialchars($_POST['idrece_dele'],ENT_QUOTES,'UTF-8');
    $idusu_ins= htmlspecialchars($_POST['idusu_ins'],ENT_QUOTES,'UTF-8');


	$consulta = $MREC->Eliminar_Insumos_repara($idinsumo_dele,  $canti_dele, $produc_dele, $idrece_dele, $idusu_ins);//llamamos al metodo del modelo
	echo $consulta;

 ?>