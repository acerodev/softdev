<?php 
	$idusuario_filtro = isset($_GET['idusuario_filtro']) ? $_GET['idusuario_filtro'] : null;
	
	//var_dump($idusuario_filtro);
	require 'serverside.php';
	$table_data->getObtnerListadoRecepcion('view_listar_recepcion','rece_id',array('rece_id','referencia','cliente_id','cliente_nombres','motivo','rece_caracteristicas','motivo_id','motivo_descripcion','rece_monto','rece_fregistro','rece_estado','rece_estatus','rece_equipo','rece_concepto','rece_adelanto','rece_debe','rece_accesorios','rece_fentrega','marca_id','marca_descripcion', 'rece_serie', 'enciende', 'tactil', 'imagen', 'vibra', 'cobertura' , 'sensor' , 'carga' , 'bluetoo' , 'wifi' , 'huella' , 'home' , 'lateral' , 'camara' , 'bateria' , 'auricular' , 'micro' , 'face' , 'tornillo' , 'rece_cod', 'cliente_celular', 'tecnico','usuario_registrador'), $idusuario_filtro);

	
 ?>



