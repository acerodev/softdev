<?php 

	require '../../model/modelo_medida.php';
	$MMEDID = new Modelo_Medida();//instaciamops
	$consulta = $MMEDID->Listar_Unidad_medida();//llamamos al modelo
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