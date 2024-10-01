<?php 

require '../../model/modelo_recepcion.php';
$MREC = new Modelo_Recepcion();//instaciamos.

	$id_re= htmlspecialchars($_POST['id_re'],ENT_QUOTES,'UTF-8');
	$equipo_d= htmlspecialchars($_POST['equipo_d'],ENT_QUOTES,'UTF-8');
	$serie_d= htmlspecialchars($_POST['serie_d'],ENT_QUOTES,'UTF-8');
    $falla_d= htmlspecialchars($_POST['falla_d'],ENT_QUOTES,'UTF-8');
	$monto_d= htmlspecialchars($_POST['monto_d'],ENT_QUOTES,'UTF-8');
    $abono_d= htmlspecialchars($_POST['abono_d'],ENT_QUOTES,'UTF-8');
	

	$array_equipo=  explode(",", $equipo_d);
    $array_serie=  explode(",", $serie_d);
    $array_falla=  explode(",", $falla_d);
	$array_monto=  explode(",", $monto_d);
    $array_abono=  explode(",", $abono_d);
	
	for($i=0; $i < count($array_equipo);$i++){
		$consulta = $MREC->Registrar_Detalle_Equi($id_re,$array_equipo[$i],$array_serie[$i],$array_falla[$i],$array_monto[$i],$array_abono[$i]);//llamamos al metodo del modelo
	}

	echo $consulta;

 ?>