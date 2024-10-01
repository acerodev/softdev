<?php 

	require '../../model/modelo_reporte_venta.php';
	$MRVE = new Modelo_Reporte_Venta();//instaciamopsç

	$consulta = $MRVE->Pivot_ventas();//llamamos al modelo
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