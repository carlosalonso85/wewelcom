<?php
// Iniciamos la sesión para poder acceder a las variables de sesión
session_start();
// Importamos el archivo que contiene la función para conectarse a la base de datos
require("basededatos.php");
// Establecemos la conexión a la base de datos
$con = conectar();
// Obtenemos los restaurantes desde la base de datos
$resultado = obtener_restaurante($con);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurantes</title>
    <!-- Importamos los estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>
<body >
    <!-- Creamos la barra de navegación -->
	<div class="navbarnp">
		<div class="lista">
			<ul class="nav-links">
				<div>
					<li><a href="proyecto.php">HOME</a>
					<img class="logo2" src="imgs/home.png"></li>
				</div>
				<div>
                <li><a href="Restaurante.php">Restarurantes</a>
					<img class="logo2" src="imgs/restaurante.jpg"></li>
				</div>
     


      </ul>
            
			
                </div>
            </div>
		
		</div>
	</div>
    <style>
    .centrar {
    display: flex;
    justify-content: center;
    align-items: left;
    height: 50vh;
    margin-left: 430px;
}
</style>
    <section style class="centrar">
<div class="play">
    <img class="logos" src="imgs\restaurante.jpg">
    <br><br><br>
    <H2 style='margin-left: 100px; color:black;'>RESTAURANTES</H2>
</div>    
</section>
<style>
/* Contenedor de los juegos */
.juegos-container {
    text-align: left;
    margin-top: 50px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
/* Contenedor individual de cada restaurnte */
.juego {
    margin: 20px;
    padding: 20px;
    box-sizing: border-box;
    max-width: 3100px;
    text-align: left;
    border: 15px ;
}
</style>

<?php
echo "<div class='juegos-container'>";
// Iteramos sobre los resultados de la consulta y mostramos la información de cada restaurante                       
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Obtener los datos de la fila actual
    $id_restaurante = $fila["id_restaurante"];
    $nombre = $fila["nombre"];
    $direccion = $fila["direccion"];
    $telefono = $fila["telefono"];
    $comentarios = $fila["comentarios"];
    
    // Generar la estructura HTML para mostrar la información y la imagen del restaurante
    echo "<div style='border: 5px solid dodgerblue;' class='juego'>";
    echo "<div style='width: 100px;'>";
    echo "<h2 style='color: black;'>$nombre</h2><br>";
    echo "</div>";
    echo "<p><h2 style='color: dodgerblue;'>direccion:</h2><br> <p style='color: black;'>$direccion</p><br>";
    echo "<p><h2 style='color: dodgerblue;'>telefono:</h2><br> <p style='color: black;'>$telefono</p><br>";
    echo "<div class='comentarios'>";
    echo "<h2 style='color: dodgerblue;'>Comentarios:</h2><br><p style='color: black;'>$comentarios</p><br>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
?>
   
 <!-- Creamos el footer y las columnas -->   
 <footer class="footerp">
        <div class="columna">
            <h3>Sobre mi</h3>
            <br>
            <ul>
                <li><img width="30px" src="imgs/contactenos.png">
                <a href="contactos.php" style="text-decoration:none; color: white;">Contacto</a></li> 
            </ul>
        </div>
        <div class="columna">
            <h3>Sigueme:</h3>
            <br>
            <ul>
                <a href="https://www.twitter.com"><img src="imgs/twitter2.png" width="30px"/></a>
                <a href="https://www.facebook.com"><img src="imgs/facebook2.png" width="30px"/></a>
                <a href="https://www.instagram.com"><img src="imgs/instagram2.png" width="30px"/></a>
                
            </ul>
        </div>
    </footer>
</body>
</html>