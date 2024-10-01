<?php
//comunica con el servidor para consultar
require_once 'modelo_conexion.php';

/**
 * 
 */
class Modelo_Cliente extends conexionBD
{

	/**************************************************
 		       LISTAR CLIENTE
	 **************************************************/
	public function Listar_Cliente()
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_LISTAR_CLIENTE()";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}


	/**************************************************
 		       LISTAR CLIENTE
	 **************************************************/
	public function Listar_Movimientos_Cliente($clienteid)
	{
		$c = conexionBD::conexionPDO();
		$sql = "CALL SP_MOVIMIENTOS_PROD_CLIENTE(?)";
		$arreglo = array();
		$query = $c->prepare($sql); //mandamos el precedure
		$query ->bindParam(1,$clienteid);//enviamos los parametros seguun la posicion
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $resp) {
			$arreglo["data"][] = $resp; //almacenando los datos del arreglo
		}
		return $arreglo;
		conexionBD::cerrar_conexion();
	}






	/**************************************************
 		       REGISTRAR CLIENTE
	 **************************************************/
	public function Registrar_Cliente($nombre, $dni, $cel, $direccion, $apellidop, $apellidom, $correo, $tipo_doc) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_REGISTRAR_CLIENTE(?,?,?,?,?,?, ?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $nombre); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $dni);
		$query->bindParam(3, $cel);
		$query->bindParam(4, $direccion);
		$query->bindParam(5, $apellidop);
		$query->bindParam(6, $apellidom);
		$query->bindParam(7, $correo);
		$query->bindParam(8, $tipo_doc);
		$resultado = $query->execute();
		//cuando en el procedure retorna 1 o 2
		if ($row = $query->fetchColumn()) {
			return $row;
		}
		conexionBD::cerrar_conexion();
	}




	/**************************************************
 		       MODIFICAR CLIENTE
	 **************************************************/
	//modificar Rol
	public function Modificar_Cliente($id, $nombre, $dni, $cel, $estado, $direccion, $apellidop, $apellidom, $correo, $tipo_doc) //viene del controlador
	{
		$c = conexionBD::conexionPDO();

		$sql = "CALL SP_MODIFICAR_CLIENTE(?,?,?,?,?,?,?,?,?,?)";
		$query = $c->prepare($sql); //mandamos el precedure

		$query->bindParam(1, $id); //enviamos los parametros seguun la posicion del procedure
		$query->bindParam(2, $nombre);
		$query->bindParam(3, $dni);
		$query->bindParam(4, $cel);
		$query->bindParam(5, $estado);
		$query->bindParam(6, $direccion);
		$query->bindParam(7, $apellidop);
		$query->bindParam(8, $apellidom);
		$query->bindParam(9, $correo);
		$query->bindParam(10, $tipo_doc);
		$resultado = $query->execute();
		//cuando en el procedure retorna 1 o 2 (GUARDAR)
		if ($row = $query->fetchColumn()) {
			return $row;
		}

		conexionBD::cerrar_conexion();
	}
}