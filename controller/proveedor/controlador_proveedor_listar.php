<?php 

	require '../../model/modelo_proveedor.php';
	$MPRV = new Modelo_Proveedor();//instaciamops
	$consulta = $MPRV->Listar_Proveedor();//llamamos al modelo
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