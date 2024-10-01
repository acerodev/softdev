<?php 


require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();
	$idrepar= htmlspecialchars($_POST['idrepar'],ENT_QUOTES,'UTF-8');
	$glosa_repa= htmlspecialchars($_POST['glosa_repa'],ENT_QUOTES,'UTF-8');
    $estado_repa= htmlspecialchars($_POST['estado_repa'],ENT_QUOTES,'UTF-8');
   
  
	$consulta = $MREC->Registrar_Reparacion($idrepar,$glosa_repa,$estado_repa);//llamamos al metodo del modelo
	echo $consulta;

 ?>