<?php 

	require '../../model/modelo_venta.php';
	$MV = new Modelo_Venta();//instaciamopsç
	$consulta = $MV->Listar_Selec_Productos_en_combo();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>