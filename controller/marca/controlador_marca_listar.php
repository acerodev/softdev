<?php 

	require '../../model/modelo_marca.php';
	$MMA = new Modelo_Marca();//instaciamops
	$consulta = $MMA->Listar_Marca();//llamamos al modelo
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