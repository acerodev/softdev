<?php 

	require '../../model/modelo_producto.php';
	$MP = new Modelo_Producto();

	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$producto= htmlspecialchars($_POST['producto'],ENT_QUOTES,'UTF-8');
	// $id_alm= htmlspecialchars($_POST['id_alm'],ENT_QUOTES,'UTF-8');
	

	$array_producto=  explode(",", $producto);
	
	for($i=0; $i < count($array_producto);$i++){
		$consulta = $MP->Registrar_Detalle_Pro($id,$array_producto[$i]);//llamamos al metodo del modelo
	}

	echo $consulta;

 ?>