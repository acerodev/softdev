<?php 


class conexionBD
{
    private static $pdo = null;

    static public function conexionPDO()
    {
        if (self::$pdo === null) {
            $host = 'localhost';
            $usuario = 'root';
            $clave = '';
            $dbname = 'dbsertecvernueva';
            try {
                self::$pdo = new PDO("mysql:host=$host; dbname=$dbname", $usuario, $clave);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->exec("set names utf8");
            } catch (Exception $e) {
                echo "La conexion ha fallado: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    static public function cerrar_conexion()
    {
        self::$pdo = null;
    }

    static public function ruta()
    {
        return "http://localhost/sertecver2_nueva/";
    }
}




/*
class conexionBD
{
	
	static public function conexionPDO()
	{
		# code...
		$host     =  'localhost' ;
		$usuario  =  'root' ;
		$clave    =  '' ;
		$dbname   =  'dbsertecvernueva' ;
		try{
			$pdo = new PDO("mysql:host=$host; dbname=$dbname", $usuario,$clave);
			$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec("set names utf8");
			return $pdo;

		}catch (exception $e){
			echo "La conexion ha fallado";
		}
	}

	function cerrar_conexion()
	{
		$this->$pdo=null;

	}

	static public  function ruta(){
        return "http://localhost/sertecver2_nueva/";
    }
}*/


?>