<?php 

	
	require '../../model/modelo_producto.php';
	$ruta = "";
	$MP = new Modelo_Producto();//instaciamops
	$producto= htmlspecialchars($_POST['producto'],ENT_QUOTES,'UTF-8');
	
	$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
	$categoria= htmlspecialchars($_POST['categoria'],ENT_QUOTES,'UTF-8');
	$stock= htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
	$pcompra= htmlspecialchars($_POST['pcompra'],ENT_QUOTES,'UTF-8');
	$pventa= htmlspecialchars($_POST['pventa'],ENT_QUOTES,'UTF-8');
	$cod_gene= htmlspecialchars($_POST['cod_gene'],ENT_QUOTES,'UTF-8');
	$provee= htmlspecialchars($_POST['provee'],ENT_QUOTES,'UTF-8');
	$nombrefoto= htmlspecialchars($_POST['nombrefoto'],ENT_QUOTES,'UTF-8');	
	$unidadmedida= htmlspecialchars($_POST['unidadmedida'],ENT_QUOTES,'UTF-8');	
	$selectImei= htmlspecialchars($_POST['selectImei'],ENT_QUOTES,'UTF-8');	

	if (empty($nombrefoto)) {
		$ruta = 'controller/producto/foto/default.png';
	}else{
		$ruta = 'controller/producto/foto/'.$nombrefoto;
	}

	$consulta = $MP->Registrar_Producto($producto,$marca, $categoria,$stock, $pcompra,$pventa,$cod_gene,$provee,$ruta,$unidadmedida ,$selectImei);//llamamos al modelo
	echo $consulta;

	if ($consulta==1 ) {
		if (!empty($nombrefoto)) {
			if (move_uploaded_file($_FILES['foto']['tmp_name'],"foto/".$nombrefoto));
		}
	}

 ?>