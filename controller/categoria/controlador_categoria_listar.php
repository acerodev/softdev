<?php 

	require '../../model/modelo_categoria.php';
	$MC = new Modelo_Categoria();//instaciamops
	$consulta = $MC->Listar_Categoria();//llamamos al modelo
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