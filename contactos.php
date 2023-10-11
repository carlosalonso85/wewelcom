<?php
// Iniciamos la sesión para poder acceder a las variables de sesión
session_start();
// Importamos el archivo que contiene la función para conectarse a la base de datos
require("basededatos.php");
// Establecemos la conexión a la base de datos
$con = conectar();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CONTACTOS</title>
    <link rel="shortcut icon" href="imgs/contactenos.png">
    <!-- Importamos los estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>

    <!-- Creamos la barra de navegación -->
	<div class="navbar">
		
		<div class="lista">
			<ul class="nav-links">
				<div>
					<li><a href="proyecto.php">HOME</a>
					<img class="logo2" src="imgs/home.png"></li>
				</div>
				<div>
					<li><a href="Restaurante.php">RESTAURANTES</a>
					<img class="logo2" src="imgs/restaurante.jpg"></li>
				</ul>
                </div>
            </div>
    <style>
    .blue{/*tipografia usada en contactos */
	  color: red;    
	font-size: 100px; 
	justify-content: center;
	  align-items: center;
	font-size: 30pt;
	  margin-left: 40%;
	  padding-bottom: 120px;
	text-align: center;
  
  }

</style>
    <!-- Datos de contacto --> 
    <div style="margin-left: 15%;" class="centrar">
        <p class="blue"> direccion de correo y telefono:</p>
        <b><p class="presentacion" style="font-family: Comic Sans MS, sans-serif; font-size: 16px; color: black; text-align: center;"><img style="margin-right:35px;" width="30px" src="imgs/panorama.png">Carlos Abel Alonso Arias : alonso.arias.carlos@hotmail.com  telefono 665814419 </p></b>

</div>
<!-- Creamos el footer y las columnas -->     
<footer class="footer">
        <div class="columna">
            <h3>Contacto</h3>
            <br>
            <ul>
					
                <li><img width="30px" src="imgs/contactenos.png">
                <a href="contactos.php" style="text-decoration:none; color: white;">Contactos</a></li> 
            </ul>
        </div>
        
        <div class="columna">
            <h3>sigueme:</h3>
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