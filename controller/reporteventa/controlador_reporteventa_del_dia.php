<?php 

    require '../../model/modelo_reporte_venta.php';
    $MRVE = new Modelo_Reporte_Venta();//instaciamopsç


	$finicio= htmlspecialchars($_POST['finicio'],ENT_QUOTES,'UTF-8');
	$ffin= htmlspecialchars($_POST['ffin'],ENT_QUOTES,'UTF-8');

	$consulta = $MRVE->Listar_Ventas_del_dia($finicio,$ffin);//llamamos al modelo
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