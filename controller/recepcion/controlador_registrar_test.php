<?php 

    require '../../model/modelo_recepcion.php';
    $MREC = new Modelo_Recepcion();

	$idrece_test= htmlspecialchars($_POST['idrece_test'],ENT_QUOTES,'UTF-8');
    $enciende= htmlspecialchars($_POST['enciende'],ENT_QUOTES,'UTF-8');
	$tactil= htmlspecialchars($_POST['tactil'],ENT_QUOTES,'UTF-8');
    $imagen= htmlspecialchars($_POST['imagen'],ENT_QUOTES,'UTF-8');
    $vibra= htmlspecialchars($_POST['vibra'],ENT_QUOTES,'UTF-8');
    $cobertura= htmlspecialchars($_POST['cobertura'],ENT_QUOTES,'UTF-8');
    $sensor= htmlspecialchars($_POST['sensor'],ENT_QUOTES,'UTF-8');
    $carga= htmlspecialchars($_POST['carga'],ENT_QUOTES,'UTF-8');
    $bluetoo= htmlspecialchars($_POST['bluetoo'],ENT_QUOTES,'UTF-8');
    $wifi= htmlspecialchars($_POST['wifi'],ENT_QUOTES,'UTF-8');
    $huella= htmlspecialchars($_POST['huella'],ENT_QUOTES,'UTF-8');
    $home= htmlspecialchars($_POST['home'],ENT_QUOTES,'UTF-8');
    $lateral= htmlspecialchars($_POST['lateral'],ENT_QUOTES,'UTF-8');
    $camara= htmlspecialchars($_POST['camara'],ENT_QUOTES,'UTF-8');
    $bateria= htmlspecialchars($_POST['bateria'],ENT_QUOTES,'UTF-8');
    $auricular= htmlspecialchars($_POST['auricular'],ENT_QUOTES,'UTF-8');
    $micro= htmlspecialchars($_POST['micro'],ENT_QUOTES,'UTF-8');
    $face= htmlspecialchars($_POST['face'],ENT_QUOTES,'UTF-8');
    $tornillo= htmlspecialchars($_POST['tornillo'],ENT_QUOTES,'UTF-8');
	

	$consulta = $MREC->Registrar_Test($idrece_test, $enciende, $tactil ,$imagen,  $vibra ,$cobertura ,$sensor ,$carga ,$bluetoo ,$wifi ,$huella ,$home ,$lateral ,$camara ,$bateria ,$auricular ,$micro ,$face ,$tornillo  );//llamamos al metodo del modelo
	echo $consulta;

 ?>


