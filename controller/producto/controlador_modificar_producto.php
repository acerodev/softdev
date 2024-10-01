<?php 

	require '../../model/modelo_producto.php';
	$MP = new Modelo_Producto();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$producto= htmlspecialchars($_POST['producto'],ENT_QUOTES,'UTF-8');
	$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');
	$categoria= htmlspecialchars($_POST['categoria'],ENT_QUOTES,'UTF-8');
	$pcompra= htmlspecialchars($_POST['pcompra'],ENT_QUOTES,'UTF-8');
	$pventa= htmlspecialchars($_POST['pventa'],ENT_QUOTES,'UTF-8');
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');
	$cod_gene= htmlspecialchars($_POST['cod_gene'],ENT_QUOTES,'UTF-8');
	$provee= htmlspecialchars($_POST['provee'],ENT_QUOTES,'UTF-8');
	$unidadm= htmlspecialchars($_POST['unidadm'],ENT_QUOTES,'UTF-8');
	
	$consulta = $MP->Modificar_Producto($id,$producto,$marca,$categoria,$pcompra,$pventa,$estado,$cod_gene,$provee,$unidadm);//llamamos al metodo del modelo
	echo $consulta;

 ?>