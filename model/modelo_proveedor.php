<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Proveedor extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR PROVEEDOR
 		  **************************************************/
		 public function Listar_Proveedor()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_PROVEEDOR()";
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
 		       REGISTRAR PROVEEDOR
 		  **************************************************/
		 public function Registrar_Proveedor($ruc,$razon,$direccion,$celular)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_PROVEEDOR(?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$ruc);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$razon);
			$query ->bindParam(3,$direccion);		
			$query ->bindParam(4,$celular);
			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2
			if ($row = $query->fetchColumn()) {
				return $row;
			}
			conexionBD::cerrar_conexion();
		 }




		  /**************************************************
 		       MODIFICAR PROVEEDOR
 		  **************************************************/
		 //modificar Rol
		 public function Modificar_Proveedor($id,$ruc,$razon,$direccion,$celular,$estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_PROVEEDOR(?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$ruc);
			$query ->bindParam(3,$razon);
			$query ->bindParam(4,$direccion);
			$query ->bindParam(5,$celular);
			$query ->bindParam(6,$estado);
			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2 (GUARDAR)
			if ($row = $query->fetchColumn()) {
				return $row;
			}

			conexionBD::cerrar_conexion();
		 }






}


 ?>