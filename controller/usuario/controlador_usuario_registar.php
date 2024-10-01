<?php 

	require '../../model/modelo_usuario.php';
	$ruta = "";
	$MU = new Modelo_Usuario();//instaciamops
	$usuario= htmlspecialchars($_POST['u'],ENT_QUOTES,'UTF-8');
	$clave= password_hash($_POST['c'],PASSWORD_DEFAULT,['cost'=>12]);
	$correo= htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
	$rol= htmlspecialchars($_POST['r'],ENT_QUOTES,'UTF-8');
	$nombrefoto= htmlspecialchars($_POST['nombrefoto'],ENT_QUOTES,'UTF-8');
	//$cliente_id= htmlspecialchars($_POST['cliente_id'],ENT_QUOTES,'UTF-8');
	if (empty($nombrefoto)) {
		$ruta = 'controller/usuario/foto/default.png';
	}else{
		$ruta = 'controller/usuario/foto/'.$nombrefoto;
	}

	$consulta = $MU->Registrar_Usuario($usuario,$clave,$correo, $rol,$ruta );//llamamos al modelo
	echo $consulta;
	if ($consulta==1 ) {
		if (!empty($nombrefoto)) {
			if (move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombrefoto));
		}
	}

 ?>