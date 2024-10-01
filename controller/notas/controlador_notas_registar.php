<?php 

	require '../../model/modelo_notas.php';
	$MNT = new Modelo_Notas();//instaciamops
    $notas_r= htmlspecialchars($_POST['notas_r'],ENT_QUOTES,'UTF-8');
    $idusunot_r= htmlspecialchars($_POST['idusunot_r'],ENT_QUOTES,'UTF-8');

	$consulta = $MNT->Registra_Notas( $notas_r, $idusunot_r);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>