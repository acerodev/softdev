<?php 

	require '../../model/modelo_cliente.php';
	$MCL = new Modelo_Cliente();//instaciamops
	$consulta = $MCL->Listar_Cliente();//llamamos al modelo
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