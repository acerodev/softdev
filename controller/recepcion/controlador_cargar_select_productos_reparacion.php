<?php 

    require '../../model/modelo_recepcion.php';
    $MREC = new Modelo_Recepcion();
	$consulta = $MREC->Listar_Selec_Productos_insumos_rece();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>