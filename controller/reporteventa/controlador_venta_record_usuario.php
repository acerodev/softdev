<?php 

	require '../../model/modelo_reporte_venta.php';
	$MRVE = new Modelo_Reporte_Venta();//instaciamopsç

	$anio= htmlspecialchars($_POST['anio'],ENT_QUOTES,'UTF-8');

	$consulta = $MRVE->Listar_Record_Venta_usuario_a($anio);//llamamos al modelo
	if ($consulta) {
		echo json_encode($consulta);
	}else{
		echo '{
			"sEcho" : 1,
			"iTotalRecords":"0",
			"iTotalDisplayRecords": "0",
			"aaData": []

		}';
	}


 ?>