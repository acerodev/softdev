<?php 

	require '../../model/modelo_motivo.php';
	$MO = new Modelo_Motivo();//instaciamops
	$consulta = $MO->Listar_Motivo();//llamamos al modelo
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