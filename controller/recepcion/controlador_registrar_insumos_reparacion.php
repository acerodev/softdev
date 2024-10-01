<?php 


require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();
	$id_repa_ins= htmlspecialchars($_POST['id_repa_ins'],ENT_QUOTES,'UTF-8');
	$id_prod_ins= htmlspecialchars($_POST['id_prod_ins'],ENT_QUOTES,'UTF-8');
    $cantid_ins= htmlspecialchars($_POST['cantid_ins'],ENT_QUOTES,'UTF-8');
	$monto_ins= htmlspecialchars($_POST['monto_ins'],ENT_QUOTES,'UTF-8');
	$idusu_ins= htmlspecialchars($_POST['idusu_ins'],ENT_QUOTES,'UTF-8');
  
	$consulta = $MREC->Registrar_Insumos_repa($id_repa_ins,$id_prod_ins,$cantid_ins, $monto_ins, $idusu_ins);//llamamos al metodo del modelo
	echo $consulta;

 ?>