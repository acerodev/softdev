<?php 

	require '../../model/modelo_notas.php';
	$MNT = new Modelo_Notas();//instaciamops
    $id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');


	$consulta = $MNT->Eliminar_Notas($id);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>