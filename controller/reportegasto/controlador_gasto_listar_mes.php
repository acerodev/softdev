<?php 

	require '../../model/modelo_reporte_gasto.php';
	$MRGA = new Modelo_Reporte_Gasto();//instaciamopsç

	$mes= htmlspecialchars($_POST['mes'],ENT_QUOTES,'UTF-8');

	$consulta = $MRGA->Listar_Gasto_Mes($mes);//llamamos al modelo
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