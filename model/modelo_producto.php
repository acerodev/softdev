<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Producto extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR LOS PRODUCTOS
 		  **************************************************/
		 public function Listar_Producto()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_PRODUCTO()";
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
 		       LISTAR CATEGORIA EN COMBO
 		  **************************************************/
		 public function Listar_select_Categoria()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_CATEGORIA()";
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
 		       LISTAR MARCA EN COMBO
 		  **************************************************/
		 public function Listar_select_Marca()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_MARCA()";
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
 		       LISTAR UNIDAD MEDIDAD EN COMBO
 		  **************************************************/
		   public function Listar_select_UnidadM()
		   {
			  $c = conexionBD:: conexionPDO();
  
			  $sql = "CALL SP_LISTAR_SELECT_UNIDAD()";
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
 		       LISTAR PRODUCTOS MAS VENDIDOS
 		  **************************************************/
		 public function Listar_Productos_mas_Vendidos()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_PRODUCTOS_MAS_VENDIDOS()";
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
 		       LISTAR PRODUCTOS SIN STOCK
 		  **************************************************/
		   public function Listar_Productos_sin_stock()
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_LISTAR_PRODUCTOS_SIN_STOCK()";
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
 		    		   REGISTRAR PRODUCTO
 		  **************************************************/
		 public function Registrar_Producto($producto,$marca, $categoria,$stock, $pcompra,$pventa,$cod_gene,$provee,$ruta,$unidadmedida,$selectImei )
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_PRODUCTO(?,?,?,?,?,?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$producto);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$marca);
			$query ->bindParam(3,$categoria);
			$query ->bindParam(4,$stock);
			$query ->bindParam(5,$pcompra);
			$query ->bindParam(6,$pventa);
			$query ->bindParam(7,$cod_gene);
			$query ->bindParam(8,$provee);
			$query ->bindParam(9,$ruta);
			$query ->bindParam(10,$unidadmedida);
			$query ->bindParam(11,$selectImei);

			$resultado = $query ->execute();
			if ($row = $query->fetchColumn()) {
				return $row;
			}

			//solo de usa cuando no se retorna un valor en el procedure
			/*if($resultado){
				return 1;
			}else{
				return 0;
			}*/

			conexionBD::cerrar_conexion();
		 }



		  /**************************************************
 		       MODIFICAR MOTIVO
 		  **************************************************/
		 //modificar Rol
		 public function Modificar_Producto($id,$producto,$marca,$categoria,$pcompra,$pventa,$estado,$cod_gene,$provee,$unidadm)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_PRODUCTO(?,?,?,?,?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$producto);
			$query ->bindParam(3,$marca);
			$query ->bindParam(4,$categoria);
			$query ->bindParam(5,$pcompra);
			$query ->bindParam(6,$pventa);
			$query ->bindParam(7,$estado);
			$query ->bindParam(8,$cod_gene);
			$query ->bindParam(9,$provee);
			$query ->bindParam(10,$unidadm);
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

		 //AUMENTAR STOCK
		 public function Aumentar_Stock($id,$cantidad, $total )//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_AUMENTAR_STOCK(?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$cantidad);
			$query ->bindParam(3,$total);
			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }



		  //AUMENTAR STOCK
		  public function Disminuir_Stock($id,$cantidad, $total )//viene del controlador
		  {
			 $c = conexionBD:: conexionPDO();
 
			 $sql = "CALL SP_DISMINUIR_STOCK(?,?,?)";
			 $query = $c->prepare($sql);//mandamos el precedure
 
			 $query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			 $query ->bindParam(2,$cantidad);
			 $query ->bindParam(3,$total);
			 $resultado = $query ->execute();
			 //solo de usa cuando no se retorna un valor en el procedure(actualizar)
			 if($resultado){
				 return 1;
			 }else{
				 return 0;
			 }
			 conexionBD::cerrar_conexion();
		  }

		   //VALIDAR IMEI 
		 public function Validar_Imei($imei_valid)
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_VALIDA_IMEI2(?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$imei_valid);//enviamos los parametros seguun la posicion del procedure
			$resultado = $query->execute();
			//cuando en el procedure retorna 1 o 2
			if ($row = $query->fetchColumn()) {
				return $row;
			}

			conexionBD::cerrar_conexion();
		 }

			// VALIDAR IMEI SI YA TIENE VENTA Y REINGRESAR
		 public function Validar_Imei_reingresar_venta($imei_valid_i)
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_VALIDA_IMEI_REINGRESO(?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$imei_valid_i);//enviamos los parametros seguun la posicion del procedure
			$resultado = $query->execute();
			//cuando en el procedure retorna 1 o 2
			if ($row = $query->fetchColumn()) {
				return $row;
			}

			conexionBD::cerrar_conexion();
		 }



		
		 /**************************************************
 		       MODIFICAR FOTO PRODUCTO
 		  **************************************************/
		   public function Modificar_Foto_Producto($id,$ruta)//viene del controlador
		   {
			  $c = conexionBD:: conexionPDO();
  
			  $sql = "CALL SP_MODIFICAR_FOTO_PRODUCTO(?,?)";
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$id);
			  $query ->bindParam(2,$ruta);//enviamos los parametros seguun la posicion del procedure
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
 		      REGISTRAR DETALLE - IMEIS
 		  **************************************************/
		 public function Registrar_Detalle_Pro($id,$array_producto)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_DETALLE_PROUCTO(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$array_producto);
			//$query ->bindParam(3,$id_alm);

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
 		       VER EL DETALLE DEL PRODUCTO POR EL ID
 		  **************************************************/
		   public function Ver_detalle_Prod($id)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_VER_DETALLE_PRODUCTO(?)";
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
 		      INSERTAR IMEI AL AUMENTAR STOCK
 		  **************************************************/
		 public function Insertar_imei_prod_aumentar($idprodt_au, $imei_au )//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_INSERTAR_IMEI_AL_MODIFICAR(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$idprodt_au);
			$query ->bindParam(2,$imei_au);
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
 		     ELIMINAR IMEI - DISMINUIR
 		  **************************************************/
		   public function Eliminar_imei_disminuir($id_pr_e,$imei_e)
		   {
			  $c = conexionBD:: conexionPDO();
  
			  $sql = "CALL SP_ELIMINAR_IMEI(?,?)";
			  $query = $c->prepare($sql);//mandamos el precedure
  
			  $query ->bindParam(1,$id_pr_e);//enviamos los parametros seguun la posicion del procedure
			  $query ->bindParam(2,$imei_e);
  
  
			  $resultado = $query ->execute();
			  //solo de usa cuando no se retorna un valor en el procedure
			  if($resultado){
				  return 1;
			  }else{
				  return 0;
			  }
			  conexionBD::cerrar_conexion();
		   }


		  







}


 ?>