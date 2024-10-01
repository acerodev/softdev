<?php 

	
require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.

	$idrp= htmlspecialchars($_POST['idrp'],ENT_QUOTES,'UTF-8');
	$equipo_e= htmlspecialchars($_POST['equipo_e'],ENT_QUOTES,'UTF-8');
	$serie_e= htmlspecialchars($_POST['serie_e'],ENT_QUOTES,'UTF-8');
    $monto_e= htmlspecialchars($_POST['monto_e'],ENT_QUOTES,'UTF-8');
    $adelanto_e= htmlspecialchars($_POST['adelanto_e'],ENT_QUOTES,'UTF-8');
	$falla_e= htmlspecialchars($_POST['falla_e'],ENT_QUOTES,'UTF-8');

	$consulta = $MREC->Insertar_equipo_direct_recep($idrp, $equipo_e, $serie_e, $monto_e, $adelanto_e , $falla_e );//llamamos al modelo
	echo $consulta;

	
 ?>