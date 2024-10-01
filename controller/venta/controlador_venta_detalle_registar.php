<?php 

	require '../../model/modelo_venta.php';
	$MV = new Modelo_Venta();//instaciamopsç

	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$producto= htmlspecialchars($_POST['producto'],ENT_QUOTES,'UTF-8');
	$cantidad= htmlspecialchars($_POST['cantidad'],ENT_QUOTES,'UTF-8');
	$precio= htmlspecialchars($_POST['precio'],ENT_QUOTES,'UTF-8');
	$imei_r= htmlspecialchars($_POST['imei_r'],ENT_QUOTES,'UTF-8');
	$descuent_p= htmlspecialchars($_POST['descuent_p'],ENT_QUOTES,'UTF-8');

	$array_producto=  explode(",", $producto);
	$array_cantidad = explode(",", $cantidad);
	$array_precio =  explode(",", $precio);
	$array_imei =  explode(",", $imei_r);
	$array_descnt =  explode(",", $descuent_p);
	for($i=0; $i < count($array_producto);$i++){
		$consulta = $MV->Registrar_Detalle_Venta($id,$array_producto[$i],$array_cantidad[$i],$array_precio[$i],$array_imei[$i],$array_descnt[$i]);//llamamos al metodo del modelo
	}

	echo $consulta;

 ?>