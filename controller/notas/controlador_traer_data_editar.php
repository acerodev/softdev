<?php 

	require '../../model/modelo_notas.php';
	$MNT = new Modelo_Notas();//instaciamops
    $idnota= htmlspecialchars($_POST['idnota'],ENT_QUOTES,'UTF-8');
   

	$consulta = $MNT->Traer_Data_Notas_editar($idnota);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>