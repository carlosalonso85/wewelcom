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
	<title>HOME</title>
    <!-- Importamos los estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <!-- Importamos las librerías de jQuery y Slick -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script src="slick/slick.min.js"></script>
    <!-- Importamos el archivo que contiene el script JavaScript -->
    <script src="indexjs.js"></script>
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
					<li><a href="Restaurante.php">Restarurantes</a>
					<img class="logo2" src="imgs/restaurante.jpg"></li>
				</div>
                <style>
	.btn {
		display: inline-block;
		padding: 15px;
		font-size: 15px;
		color: #fff;
		background-color: #000;
		border-radius: 4px;
	}
	.btn:hover {
		background-color: red;
	}
</style>

<?php

// Verificar si la variable de sesión existe
if (isset($_SESSION['nombre_usuario'])) {
    // Mostrar el nombre del usuario, botón de gestionar juegos y botón de cerrar sesión
    echo '<div>
                <p>Bienvenido, '.$_SESSION['nombre_usuario'].'</p>
                <li><a href="gestionarRestaurante.php" class="btn">Gestionar restaurantes</a></li>
                <br>
                <li><a href="logout.php" class="btn">Cerrar sesión</a></li>
            </div>';
} else {
    // Mostrar el enlace de registro
    echo '<div>
                <li><a href="inicio_sesion.php">REGISTRO</a>
                <img class="logo2" src="imgs/usuario-de-perfil.png"></li>
            </div>';
}
?>
      </ul>
      <style>
             .btn-negro {
                background-color: black;
                color: white;
                padding: 5px;
                font-size: 15px;
                border: none;
                background-color: #000;
		    border-radius: 4px;
            }
            </style>
		</div>
	</div>
    <!-- Creamos un contendor para el slider -->
	<section class="centrar">
        
        <div class="contenedorSlider">
            <br>
            <h2 style="color:BLACK">LOS MEJORES RESTAURANTES DEL MES</h2>
            <br>
            <div id="slider">
                
                <div><h2 style="color:red" >Dos cielos</h2> <br />
                    <img src="imgs/doscielos.jpg" alt="" srcset="">
                    
                </div>
                <div><h2 style="color:red">cebo</h2> <br />
                    <img src="imgs/cebo.png" alt="" srcset="">
                    
                </div>
                <div><h2 style="color:red">Lamucca</h2> <br />
                    <img src="imgs/lamucca.png" alt="" srcset="">
                    
                </div>
                <div><h2 style="color:red">vivares</h2> <br />
                    <img src="imgs/vivares.png" alt="" srcset="">
                    
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- Creamos el footer y las columnas -->
    <footer class="footer">
        <div class="columna">
            <h3>Sobre el proyecto</h3>
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