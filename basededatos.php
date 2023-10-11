<?php
// Establecer los valores para la conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "proyecto";

// Función para conectar a la base de datos

function conectar(){
	// Conectar a la base de datos con los valores especificados
	$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or die("Error al conectar con la base de datos");
	// Seleccionar la base de datos
	mysqli_select_db($con, $GLOBALS["db_name"]);
	// Devolver la conexión
	return $con;
}

// Función para obtener los restaurantes
function obtener_restaurante($con){
	// Ejecutar una consulta para seleccionar 
	$resultado = mysqli_query($con, "select id_restaurante, nombre, direccion, telefono, comentarios  from restaurante ");
	return $resultado;
}










function obtener_num_filas($resultado){
	// Se obtiene el número de filas de un resultado obtenido de una consulta
	return mysqli_num_rows($resultado);
}
function obtener_resultados($resultado){
	// Se obtienen los resultados de una consulta en forma de array
	return mysqli_fetch_array($resultado);
}

function cerrar_conexion($con){
	// Se cierra la conexión a la base de datos
	mysqli_close($con);
}
?>
<?php
	// Definición de la clase Database
	class Database {
		// Variables de configuración de la base de datos
		private static $db_host = "localhost";
		private static $db_user = "root";
		private static $db_pass = "";
		private static $db_name = "proyecto";
		
		// Variables de conexión y resultados
		private $con;
		private $result;
		private $numRows;
		
		// Constructor de la clase, se conecta a la base de datos
		public function __construct(){
			$this->con = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
		}
		
		// Cierra la conexión a la base de datos
		public function disconnect(){
			$this->con->close();
		}
		
		// Ejecuta una consulta a la base de datos
		public function query($sql){
			$this->result = $this->con->query($sql); // Se guarda el resultado en la variable $result
			$this->numRows = $this->result->num_rows; // Se guarda la cantidad de filas en la variable $numRows
		}
		
		// Retorna el número de filas en el resultado
		public function numRows(){
			return $this->numRows;
		}
		
		// Retorna un arreglo con las filas del resultado
		public function rows(){
			$rows = array(); // Se crea un arreglo vacío
			for($i=0;$i<$this->numRows;$i++){ // Se recorre el resultado
				$rows[] = $this->result->fetch_assoc(); // Se agrega la fila actual al arreglo
			}
			return $rows; // Se retorna el arreglo completo
		}
	}
?>