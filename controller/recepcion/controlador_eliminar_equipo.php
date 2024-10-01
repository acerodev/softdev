<?php 


	
require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.

	$id_eq= htmlspecialchars($_POST['id_eq'],ENT_QUOTES,'UTF-8');


	$consulta = $MREC->Eliminar_Equi($id_eq);//llamamos al metodo del modelo
	echo $consulta;

 ?>