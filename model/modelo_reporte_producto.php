<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Reporte_Producto extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR ENTRADAS Y SALIDAS DE LOS PRODUCTOS
 		  **************************************************/
		 public function Listar_Entrada_Salida_Producto()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_REPORTE_PRODUCTO_EN_SAL()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }



		 /**************************************************
 		       LISTAR PRODUCTOS EN COMBO
 		  **************************************************/
		 public function Listar_select_Producto()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_PRODUCTO()";
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
 		       KARDEX EN DATATABLE
 		  **************************************************/
		 public function Listar_Kardex($pro)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_KARDEX_COD_PRODUCTO(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$pro);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }


		  /**************************************************
 		       LISTAR UTILIDAD DE PRODUCTOS
 		  **************************************************/
		   public function Listar_Prod_utilidad()
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_REPORTE_UTILIDAD()";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  //$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			  $query ->execute();
			  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach ($resultado as $resp) {
					  $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }

		    /**************************************************
 		       KARDEX EN DATATABLE POR PRODUCTO CON IMEI
 		  **************************************************/
		 public function Listar_Movimeintos_por_producto_imei($idprod)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_CONIMEI(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$idprod);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }

		     /**************************************************
 		       KARDEX EN DATATABLE POR PRODUCTO CON IMEI
 		  **************************************************/
		   public function Listar_Movimeintos_imei($pa_imei)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_BUSCAR_MOV_IMEI(?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$pa_imei);//enviamos los parametros seguun la posicion
  
			  $query ->execute();
			  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach ($resultado as $resp) {
					  $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }


		     /**************************************************
 		      MOSTRAS REPORTE DE COMPRAS DE IMEI
 		  **************************************************/
		   public function Listar_Rte_Compras_imei()
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_LISTAR_COMPRAS_PRODUCTOS_IMEI()";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			 // $query ->bindParam(1,$pa_imei);//enviamos los parametros seguun la posicion
  
			  $query ->execute();
			  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach ($resultado as $resp) {
					  $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }

		  /**************************************************
 		       KARDEX EN DATATABLE POR PRODUCTO CON TECNICO
 		  **************************************************/
		   public function Listar_Movimeintos_por_producto_tecnico($idprod)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_SIN_IMEI(?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$idprod);//enviamos los parametros seguun la posicion
  
			  $query ->execute();
			  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach ($resultado as $resp) {
					  $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }
  
		     /**************************************************
 		      VER IMEI VENDIDOS
 		  **************************************************/
		 public function Listar_Imei_Vendidos($idprod)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_VER_IMEI_VENDIDOS(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$idprod);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }








}


 ?>
