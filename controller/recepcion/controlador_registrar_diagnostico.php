<?php 


require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();
	$id_diag= htmlspecialchars($_POST['id_diag'],ENT_QUOTES,'UTF-8');
	$id_equi= htmlspecialchars($_POST['id_equi'],ENT_QUOTES,'UTF-8');
    $desc_diagnos= htmlspecialchars($_POST['desc_diagnos'],ENT_QUOTES,'UTF-8');
   
  
	$consulta = $MREC->Registrar_Diagnostico_repa($id_diag,$id_equi,$desc_diagnos);//llamamos al metodo del modelo
	echo $consulta;

 ?>