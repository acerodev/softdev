<?php 

	require '../../model/modelo_reporte_producto.php';
	$MRPR = new Modelo_Reporte_Producto();//instaciamops

	$pro= htmlspecialchars($_POST['pro'],ENT_QUOTES,'UTF-8');

	$consulta = $MRPR->Listar_Kardex($pro);//llamamos al modelo
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