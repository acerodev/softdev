<?php 

	require '../../model/modelo_recepcion.php';
	$MREC = new Modelo_Recepcion();//instaciamops

	$finicio= htmlspecialchars($_POST['finicio'],ENT_QUOTES,'UTF-8');
	$ffin= htmlspecialchars($_POST['ffin'],ENT_QUOTES,'UTF-8');

	$consulta = $MREC->Listar_Grafico_servico($finicio,$ffin);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>