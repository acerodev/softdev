<?php 

	
	require '../../model/modelo_producto.php';
	$MP = new Modelo_Producto();
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$cantidad= htmlspecialchars($_POST['cantidad'],ENT_QUOTES,'UTF-8');
	$total= htmlspecialchars($_POST['total'],ENT_QUOTES,'UTF-8');

	$consulta = $MP->Aumentar_Stock($id,$cantidad, $total );//llamamos al modelo
	echo $consulta;

 ?>