<?php 

	require '../../model/modelo_reporte_gasto.php';
	$MRGA = new Modelo_Reporte_Gasto();//instaciamopsç
	$consulta = $MRGA->Listar_select_Anio_Gasto();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>