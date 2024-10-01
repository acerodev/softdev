<?php 

	require '../../model/modelo_producto.php';
	$MP = new Modelo_Producto();//instaciamops
	$consulta = $MP->Listar_Producto();//llamamos al modelo
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