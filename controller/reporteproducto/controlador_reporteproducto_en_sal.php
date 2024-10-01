<?php 

	require '../../model/modelo_reporte_producto.php';
	$MRPR = new Modelo_Reporte_Producto();//instaciamops
	$consulta = $MRPR->Listar_Entrada_Salida_Producto();//llamamos al modelo
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