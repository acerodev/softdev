<?php
//comunica con el servidor para consultar
require_once 'modelo_conexion.php';

/**
 * 
 */
class Modelo_Recepcion extends conexionBD
{

	/**************************************************
 		       LISTAR RECEPCION POR FILTRO DE FECHA
	 **************************************************/
	public function Listar_Recepion_table($finicio, $ffin, $idusuario_filtro)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_RECEPCION(?,?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		$query->bindParam(3, $idusuario_filtro);
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}

	public function Listar_Recepion_table_Admin($finicio, $ffin)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_RECEPCION_ADMIN(?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}



	/**************************************************
 		      LISTAR CLIENTE EN COMBO
	 **************************************************/
	public function Listar_select_Cliente()
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_SELECT_CLIENTE()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}







	/**************************************************
 		      LISTAR MOTIVO EN COMBO
	 **************************************************/
	public function Listar_select_Motivo()
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_SELECT_MOTIVO()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		      LISTAR TECNICOS EN COMBO
	 **************************************************/
	public function Listar_select_Tecnicos()
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_SELECT_TECNICOS()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}






	/**************************************************
 		       LISTAR ROLES EN COMBO
	 **************************************************/
	public function Listar_Notificaiones()
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_NOTIFICACION()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       LISTAR ROLES EN COMBO
	 **************************************************/
	public function Listar_Notificaiones_Tecnico($idtecnico)
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_NOTIFICACION_TECNICO(?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query ->bindParam(1,$idtecnico);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}





	/**************************************************
 		       LISTAR WIDGET EN DASHBOARD
	 **************************************************/
	public function Listar_widget($finicio, $ffin)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_DATOS_WIDGET(?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}





	/**************************************************
 		       LISTAR GRAFICO SERVICIO
	 **************************************************/
	public function Listar_Grafico_servico($finicio, $ffin)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_GRAFICO_SERVICIO(?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       LISTAR GRAFICO VENTAS
	 **************************************************/
	public function Listar_Grafico_ventas($finicio, $ffin)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_GRAFICO_VENTAS(?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}









	/**************************************************
 		       REGISTRAR RECEPCION
	 **************************************************/
	public function Registrar_Recepcion($monto, $cliente, $motivo, $adelanto, $debe, $accesorios, $fentrega, $cod_re, $tecnicoid, $usuario_regist,$ruta) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_RECEPCION(?,?,?,?,?,?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $monto);
		$query->bindParam(2, $cliente);
		$query->bindParam(3, $motivo);
		$query->bindParam(4, $adelanto);
		$query->bindParam(5, $debe);
		$query->bindParam(6, $accesorios);
		$query->bindParam(7, $fentrega);
		$query->bindParam(8, $cod_re);
		$query->bindParam(9, $tecnicoid);
		$query->bindParam(10, $usuario_regist);
		$query->bindParam(11, $ruta);

		$resultado = $query->execute();

		if ($row = $query->fetchColumn()) {
			return $row;
		}
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		      REGISTRAR DETALLE - IMEIS
	 **************************************************/
	public function Registrar_Detalle_Equi($id_re, $array_equipo, $array_serie, $array_falla, $array_monto, $array_abono) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_DETALLE_RECE_EQUIPO(?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $id_re); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $array_equipo);
		$query->bindParam(3, $array_serie);
		$query->bindParam(4, $array_falla);
		$query->bindParam(5, $array_monto);
		$query->bindParam(6, $array_abono);

		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}

	public function Registrar_Detalle_Insumos_recep($idrecep,$array_idinsumo,$array_catidad_i,$array_mont_ins, $idusu_ins) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_DETALLE_INSUMOS_RECEP(?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $idrecep); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $array_idinsumo);
		$query->bindParam(3, $array_catidad_i);
		$query->bindParam(4, $array_mont_ins);
		$query->bindParam(5, $idusu_ins);

		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}





	/**************************************************
 		       MODIFICAR EL MOTIVO
	 **************************************************/
	public function Modificar_Recepcion($id, $cliente, $caracteristicas, $motivo, $concepto, $monto, $estado, $adelanto, $debe, $accesorios, $fentrega, $recoger, $tecnicoid) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_MODIFICAR_RECEPCION(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $id); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $cliente);

		$query->bindParam(3, $caracteristicas);
		$query->bindParam(4, $motivo);
		$query->bindParam(5, $concepto);
		$query->bindParam(6, $monto);
		$query->bindParam(7, $estado);
		$query->bindParam(8, $adelanto);
		$query->bindParam(9, $debe);
		$query->bindParam(10, $accesorios);
		$query->bindParam(11, $fentrega);
		$query->bindParam(12, $recoger);
		$query->bindParam(13, $tecnicoid);

		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       VER EL DETALLE DE LA RECEPCION POR EL ID
	 **************************************************/
	public function Ver_detalle_Equi($idrec)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_VER_DETALLE_RECEPCION(?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $idrec); //enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		     ELIMINAR QUIPO DE LA TABLA DETALLE RECEPCION
	 **************************************************/
	public function Eliminar_Equi($id_eq) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_ELIMINAR_EQUIPO_RECE(?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $id_eq); //enviamos los parametros seguun la posicion del procedure
		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		      INSERTAR SERIE DE EQUIPO AL MODIFICAR RECEPCION - DIRECTO
	 **************************************************/
	public function Insertar_equipo_direct_recep($idrp, $equipo_e, $serie_e, $monto_e, $adelanto_e, $falla_e) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_INSERTAR_EQUIPO_DIRECTO_MODIFICAR(?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $idrp);
		$query->bindParam(2, $equipo_e);
		$query->bindParam(3, $serie_e);
		$query->bindParam(4, $monto_e);
		$query->bindParam(5, $adelanto_e);
		$query->bindParam(6, $falla_e);

		$resultado = $query->execute();
		//cuando en el procedure retorna 1 o 2
		if ($row = $query->fetchColumn()) {
			return $row;
		}
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       REGISTRAR EL MOTIVO
	 **************************************************/
	public function Registrar_Test($idrece_test, $enciende, $tactil, $imagen,  $vibra, $cobertura, $sensor, $carga, $bluetoo, $wifi, $huella, $home, $lateral, $camara, $bateria, $auricular, $micro, $face, $tornillo) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_TEST(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $idrece_test);
		$query->bindParam(2, $enciende);
		$query->bindParam(3, $tactil);
		$query->bindParam(4, $imagen);
		$query->bindParam(5, $vibra);
		$query->bindParam(6, $cobertura);
		$query->bindParam(7, $sensor);
		$query->bindParam(8, $carga);
		$query->bindParam(9, $bluetoo);
		$query->bindParam(10, $wifi);
		$query->bindParam(11, $huella);
		$query->bindParam(12, $home);
		$query->bindParam(13, $lateral);
		$query->bindParam(14, $camara);
		$query->bindParam(15, $bateria);
		$query->bindParam(16, $auricular);
		$query->bindParam(17, $micro);
		$query->bindParam(18, $face);
		$query->bindParam(19, $tornillo);

		$resultado = $query->execute();

		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}



	/**************************************************
 		      TRAER MONTOS DEL DETALE DE RECEPCIO EQUIPOS
	 **************************************************/

	public function Calculos_motnos_rece_detalle($idrece_calculo)
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_CALCULO_MONTOS_RECEP_EQUIPOS(?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $idrece_calculo); //enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       LISTAR REPARACIONES POR FILTRO DE FECHA
	 **************************************************/
	public function Listar_Reparacion_table($finicio, $ffin, $idusuario_filtro)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_REPARACION(?,?,?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $finicio); //enviamos los parametros seguun la posicion
		$query->bindParam(2, $ffin);
		$query->bindParam(3, $idusuario_filtro);
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		      REGISTRAR DIAGNOSTICO
	 **************************************************/

	public function Registrar_Diagnostico_repa($id_diag, $id_equi, $desc_diagnos) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_DIAGNOSTICO(?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $id_diag); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $id_equi);
		$query->bindParam(3, $desc_diagnos);

		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure(actualizar)
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		      REGISTRAR RECEPCION
	 **************************************************/

	public function Registrar_Reparacion($idrepar, $glosa_repa, $estado_repa) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_REPARACION(?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $idrepar); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $glosa_repa);
		$query->bindParam(3, $estado_repa);

		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure(actualizar)
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}



	/**************************************************
 		       LISTAR PRODUCTOS EN COMBO - INSUMOS
	 **************************************************/
	public function Listar_Selec_Productos_insumos_rece()
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_LISTAR_SELECT_PRODUCTO_REPARACION_INSUMO()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll();
		foreach ($resultado as $resp) {
			$arreglo[] = $resp; //almacenando los datos del arreglo


		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		      REGISTRAR INSUMOS
	 **************************************************/
	public function Registrar_Insumos_repa($id_repa_ins,$id_prod_ins,$cantid_ins, $monto_ins, $idusu_ins) 
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_INSUMOS_REPARACION(?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $id_repa_ins); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $id_prod_ins);
		$query->bindParam(3, $cantid_ins);
		$query->bindParam(4, $monto_ins);
		$query->bindParam(5, $idusu_ins);

		$resultado = $query->execute();
		if ($row = $query->fetchColumn()) {
			return $row;
		}
		// if ($resultado) {
		// 	return 1;
		// } else {
		// 	return 0;
		// }
		conexionBD::cerrar_conexion();
	}

	/**************************************************
 		       VER EL DETALLE DE LOS INSUMOS REGISTRADOS EN LA REPARACION
	 **************************************************/
	public function Ver_detalle_Insumos_repara($idrec)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_INSUMOS_DETALLE_REPARACION(?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query->bindParam(1, $idrec); //enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		     ELIMINAR INSUMOS DEL DATATABLE
	 **************************************************/
	public function Eliminar_Insumos_repara($idinsumo_dele,  $canti_dele, $produc_dele, $idrece_dele, $idusu_ins) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_ELIMINAR_INSUMOS_REPARACION(?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $idinsumo_dele); 
		$query->bindParam(2, $canti_dele);
		$query->bindParam(3, $produc_dele);
		$query->bindParam(4, $idrece_dele);
		$query->bindParam(5, $idusu_ins);
		$resultado = $query->execute();
		//solo de usa cuando no se retorna un valor en el procedure
		if ($resultado) {
			return 1;
		} else {
			return 0;
		}
		conexionBD::cerrar_conexion();
	}







}
