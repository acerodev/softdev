<?php 

	require '../../model/modelo_notas.php';
	$MNT = new Modelo_Notas();//instaciamops
    $idusuario= htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
	$consulta = $MNT->Listar_Notas_por_usuario( $idusuario);//llamamos al modelo
	echo json_encode($consulta);
	

 ?>