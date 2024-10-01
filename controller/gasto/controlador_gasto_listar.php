<?php 

	require '../../model/modelo_gasto.php';
	$MG = new Modelo_Gasto();//instaciamops
	$consulta = $MG->Listar_Gasto();//llamamos al modelo
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