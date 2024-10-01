<?php 

	require '../../model/modelo_recepcion.php';
	$ruta = "";
	$MREC = new Modelo_Recepcion();

	//$equipo= htmlspecialchars($_POST['equipo'],ENT_QUOTES,'UTF-8');
	//$caracteristicas= htmlspecialchars($_POST['caracteristicas'],ENT_QUOTES,'UTF-8');
	//$concepto= htmlspecialchars($_POST['concepto'],ENT_QUOTES,'UTF-8');
	$monto= htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
	$cliente= htmlspecialchars($_POST['cliente'],ENT_QUOTES,'UTF-8');
	$motivo= htmlspecialchars($_POST['motivo'],ENT_QUOTES,'UTF-8');
	$adelanto= htmlspecialchars($_POST['adelanto'],ENT_QUOTES,'UTF-8');
	$debe= htmlspecialchars($_POST['debe'],ENT_QUOTES,'UTF-8');

	$accesorios= htmlspecialchars($_POST['accesorios'],ENT_QUOTES,'UTF-8');
	$fentrega= htmlspecialchars($_POST['fentrega'],ENT_QUOTES,'UTF-8');
	
	$cod_re= htmlspecialchars($_POST['cod_re'],ENT_QUOTES,'UTF-8');
	$tecnicoid= htmlspecialchars($_POST['tecnicoid'],ENT_QUOTES,'UTF-8');
	$usuario_regist= htmlspecialchars($_POST['usuario_regist'],ENT_QUOTES,'UTF-8');
	$nombrefoto= htmlspecialchars($_POST['nombrefoto'],ENT_QUOTES,'UTF-8');

	if (empty($nombrefoto)) {
		$ruta = 'controller/recepcion/foto/no_imagen.png';
	}else{
		$ruta = 'controller/recepcion/foto/'.$nombrefoto;
	}


	$consulta = $MREC->Registrar_Recepcion($monto,$cliente,$motivo,$adelanto,$debe,$accesorios,$fentrega ,$cod_re, $tecnicoid, $usuario_regist,$ruta );//llamamos al metodo del modelo
	echo $consulta;
	if ($consulta >=1 ) {
		if (!empty($nombrefoto)) {
			if (move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombrefoto));
		}
	}

	//($equipo,$caracteristicas,$concepto,$monto,$cliente,$motivo,$adelanto,$debe,$accesorios,$fentrega,$marca, $serie);

 ?>