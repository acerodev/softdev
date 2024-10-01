<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Venta extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR VENTA POR FILTRO DE FECHA
 		  **************************************************/
		 public function Listar_Venta($finicio,$ffin, $idusuario_ventas)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_VENTA_FILTRO(?,?,?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$ffin);
			$query ->bindParam(3,$idusuario_ventas);
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }

		 public function Listar_Venta_Admin($finicio,$ffin)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_VENTA_ADMIN(?,?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$ffin);
			
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }




		  /**************************************************
 		       LISTAR CLIENTE EN MODAL
 		  **************************************************/
		 public function Listar_Selec_Cliente()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_SELECT_CLIENTE()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }




		  /**************************************************
 		       LISTAR PRODUCTO EN MODAL
 		  **************************************************/
		 public function Listar_Selec_Producto()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_PRODUCTO_VENTA()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }




		   /**************************************************
 		       LISTAR COMPROBANTE EN COMBO
 		  **************************************************/
		 public function Listar_Selec_Comprobante()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_COMPROBANTE()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			

			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }




		    /**************************************************
 		       LISTAR PRODUCTOS EN COMBO
 		  **************************************************/
		 public function Listar_Selec_Productos_en_combo()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_PRODUCTO_VENTA()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			

			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }






		   /**************************************************
 		      REGISTRAR VENTA CABECERA
 		  **************************************************/
		 public function Registrar_Venta($idcliente,$compro,$serie,$numero,$impuesto,$total,$tipo,$porcentaje,$idusuario,$idformapago, $observacion, $monto_efectiv, $cod_opera, $monto_tarje, $cajaid_v, $totaldesct)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_VENTA(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$idcliente);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$compro);
			$query ->bindParam(3,$serie);
			$query ->bindParam(4,$numero);
			$query ->bindParam(5,$impuesto);
			$query ->bindParam(6,$total);
			$query ->bindParam(7,$tipo);
			$query ->bindParam(8,$porcentaje);
			$query ->bindParam(9,$idusuario);
			$query ->bindParam(10,$idformapago);
			$query ->bindParam(11,$observacion);
			$query ->bindParam(12,$monto_efectiv);
			$query ->bindParam(13,$cod_opera);
			$query ->bindParam(14,$monto_tarje);
			$query ->bindParam(15,$cajaid_v);
			$query ->bindParam(16,$totaldesct);


			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2 (GUARDAR)
			if ($row = $query->fetchColumn()) {
				return $row;
			}
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			//if($resultado){
			//	return 1;
			//}else{
			//	return 0;
			//}
			conexionBD::cerrar_conexion();
		 }





		   /**************************************************
 		      REGISTRAR DETALLE
 		  **************************************************/
		 public function Registrar_Detalle_Venta($id,$array_producto,$array_cantidad,$array_precio, $array_imei, $array_descnt)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_DETALLE_VENTA(?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$array_producto);
			$query ->bindParam(3,$array_cantidad);
			$query ->bindParam(4,$array_precio);
			$query ->bindParam(5,$array_imei);
			$query ->bindParam(6,$array_descnt);

			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }





		   /**************************************************
 		      ANULAR VENTA
 		  **************************************************/
		 public function Anular_Venta($id,$estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_ANULAR_VENTA(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$estado);


			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }


		    /**************************************************
 		      PAGAR LA VENTA
 		  **************************************************/
		 public function Pagar_Venta($id,$estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_PAGAR_VENTA(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$estado);


			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }


		
		 
		 /**************************************************
 		       VER EL DETALLE DE LA VENTA POR EL ID
 		  **************************************************/
		   public function Ver_detalle_Venta($id)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_VER_DETALLE_VENTA(?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$id);//enviamos los parametros seguun la posicion
			  $query ->execute();
			  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach ($resultado as $resp) {
					  $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }




		   

		 /**************************************************
 		       MODIFICAR EMPRESA
 		  **************************************************/
		 public function Modificar_estado_Venta($idventa, $estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_ESTADO_VENTA(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$idventa);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$estado);
			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }

		  /**************************************************
 		       TRAER IMEI POR PRODUCTO 
 		  **************************************************/
		   public function Traer_Imei_pro($id_pro)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_TRAER_IMEI_PROD(?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$id_pro);
			  $query ->execute();
			  $resultado = $query->fetchAll();
			  // foreach ($resultado as $resp) {
			  // 	$arreglo[]=$resp;
			  // }
			  foreach ($resultado as $resp) {
				  $arreglo[]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }











}


 ?>