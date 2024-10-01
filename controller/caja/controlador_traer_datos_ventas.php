<?php 

    require '../../model/modelo_caja.php';
    $MCAJA = new Modelo_Caja();//instaciamos
    
	$consulta =  $MCAJA->Listar_Total_Ventas();//llamamos al modelo
	echo json_encode($consulta);
	

 ?>