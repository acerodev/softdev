<?php 

	require '../../model/modelo_cotizacion.php';
	$MCOT = new Modelo_Cotizacion();//instaciamops
	$consulta = $MCOT->Listar_Select_Forma_pago();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>