<?php 

	require '../../model/modelo_reporte_producto.php';
	$MRPR = new Modelo_Reporte_Producto();//instaciamops

	$pa_imei= htmlspecialchars($_POST['pa_imei'],ENT_QUOTES,'UTF-8');

	$consulta = $MRPR->Listar_Movimeintos_imei($pa_imei);//llamamos al modelo
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