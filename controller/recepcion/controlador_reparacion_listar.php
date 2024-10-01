<?php 

require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();

	$finicio= htmlspecialchars($_POST['finicio'],ENT_QUOTES,'UTF-8');
	$ffin= htmlspecialchars($_POST['ffin'],ENT_QUOTES,'UTF-8');
    $idusuario_filtro= htmlspecialchars($_POST['idusuario_filtro'],ENT_QUOTES,'UTF-8');

	$consulta = $MREC->Listar_Reparacion_table($finicio,$ffin, $idusuario_filtro);//llamamos al modelo
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