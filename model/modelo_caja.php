<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Caja extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR CAJAS
 		  **************************************************/
		 public function Listar_Cajas($finicio,$ffin)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_REPORTE_CAJA_CHICA(?,?)";
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
 		      REGISTRAR APERTURA DE CAJA
 		  **************************************************/
	
		public function Registrar_Apertura_caja($descripcion,$monto)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_APERTURA_CAJA(?,?)";
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$descripcion);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$monto);
			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2
			if ($row = $query->fetchColumn()) {
				return $row;
			}
			conexionBD::cerrar_conexion();
		 }


          /**************************************************
 		       LISTAR total ventas
 		  **************************************************/

           public function Listar_Total_Ventas()
           {
              $c = conexionBD:: conexionPDO();
  
              $sql = "CALL SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA()";
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
 		       LISTAR total ventas
 		  **************************************************/

        //    public function Traer_url_sistema()
        //    {
        //       $c = conexionBD:: conexionPDO();
  
        //       $sql = "CALL SP_TRAER_URL_SISTEMA()";
        //       $arreglo = array();
        //       $query = $c->prepare($sql);//mandamos el precedure
        //       //$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
        //       $query ->execute();
        //       $resultado = $query->fetchAll();
        //       foreach ($resultado as $resp) {
        //               $arreglo[]=$resp;//almacenando los datos del arreglo
        //       }
        //       return $arreglo;
        //       conexionBD::cerrar_conexion();
        //    }




        /**************************************************
 		      REGISTRAR CIERRE DE CAJA
 		  **************************************************/
	
		public function Registrar_Cierre_caja($monto_ventas,$cant_ventas,$monto_gasto,$cant_gasto,$monto_total,$monto_servicio,$cant_servicio, $monto_ingre,  $cant_ingre)//viene del controlador
        {
           $c = conexionBD:: conexionPDO();

           $sql = "CALL SP_REGISTRAR_CAJA_CIERRE(?,?,?,?,?,?,?,?,?)";
           $query = $c->prepare($sql);//mandamos el precedure
           $query ->bindParam(1,$monto_ventas);//enviamos los parametros seguun la posicion del procedure
           $query ->bindParam(2,$cant_ventas);
           $query ->bindParam(3,$monto_gasto);
           $query ->bindParam(4,$cant_gasto);
           $query ->bindParam(5,$monto_total);
		   $query ->bindParam(6,$monto_servicio);
		   $query ->bindParam(7,$cant_servicio);
		   $query ->bindParam(8,$monto_ingre);
		   $query ->bindParam(9,$cant_ingre);
           $resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }



    }


?>