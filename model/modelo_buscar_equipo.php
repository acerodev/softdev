<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Buscar_Equipo extends conexionBD
	{




		 /**************************************************
 		      BUSCAR EQUIPO POR DNI
 		  **************************************************/
		 public function Listar_Equipo_dni($dni)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_BUSCAR_EQUIPO_DNI(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$dni);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }


		 /**************************************************
 		      BUSCAR EQUIPO POR DNI
 		  **************************************************/
		   public function Listar_Ventas_dni_inicio($dni)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_BUSCAR_VENTAS_CLIENTE_INICIO(?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$dni);//enviamos los parametros seguun la posicion
  
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