<?php 

	require '../../model/modelo_recepcion.php';
	$MREC = new Modelo_Recepcion();//instaciamos.

	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$cliente= htmlspecialchars($_POST['cliente'],ENT_QUOTES,'UTF-8');
	//$equipo= htmlspecialchars($_POST['equipo'],ENT_QUOTES,'UTF-8');
	$caracteristicas= htmlspecialchars($_POST['caracteristicas'],ENT_QUOTES,'UTF-8');
	$motivo= htmlspecialchars($_POST['motivo'],ENT_QUOTES,'UTF-8');
	$concepto= htmlspecialchars($_POST['concepto'],ENT_QUOTES,'UTF-8');
	$monto= htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');
	$adelanto= htmlspecialchars($_POST['adelanto'],ENT_QUOTES,'UTF-8');
	$debe= htmlspecialchars($_POST['debe'],ENT_QUOTES,'UTF-8');

	$accesorios= htmlspecialchars($_POST['accesorios'],ENT_QUOTES,'UTF-8');
	$fentrega= htmlspecialchars($_POST['fentrega'],ENT_QUOTES,'UTF-8');
	//$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
	$recoger= htmlspecialchars($_POST['recoger'],ENT_QUOTES,'UTF-8');
	$tecnicoid= htmlspecialchars($_POST['tecnicoid'],ENT_QUOTES,'UTF-8');



	$consulta = $MREC->Modificar_Recepcion($id,$cliente,$caracteristicas,$motivo,$concepto,$monto,$estado,$adelanto,$debe,$accesorios,$fentrega,$recoger, $tecnicoid);//llamamos al metodo del modelo
	echo $consulta;

 ?>