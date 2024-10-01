<?php 

	require '../../model/modelo_recepcion.php';
	$MREC = new Modelo_Recepcion();//instaciamops

	$idrece_calculo= htmlspecialchars($_POST['idrece_calculo'],ENT_QUOTES,'UTF-8');


	$consulta = $MREC->Calculos_motnos_rece_detalle($idrece_calculo);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>