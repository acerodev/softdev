<?php 

require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.


	$idrec= htmlspecialchars($_POST['idrec'],ENT_QUOTES,'UTF-8');

	$consulta = $MREC->Ver_detalle_Insumos_repara($idrec);//llamamos al modelo
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