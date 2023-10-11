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
    <link rel="shortcut icon" href="imgs/home.png">
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
					<<li><a href="Restaurante.php">Restarurantes</a>
					<img class="logo2" src="imgs/restaurante.jpg"></li>
				</div>
				
                <style>
	.btn {
		display: inline-block;
		padding: 5px;
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
    // Mostrar el nombre del usuario, botón de gestionar resturantes y botón de cerrar sesión
    echo '<div>
                <p>Bienvenido, '.$_SESSION['nombre_usuario'].'</p>
                <li><a href="gestionarRestaurante.php" class="btn">Gestionar restaurante</a></li>
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
		
		</div>
	</div>
    <!-- Creamos un contendor para el slider -->
	<?php

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "proyecto");
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $pass = $_POST['pass'];

    // Insertar el usuario en la base de datos
    $stmt = mysqli_prepare($conexion, "INSERT INTO usuario (nombre_usuario, pass, tipo_usuario) VALUES (?, ?, 0)");
    mysqli_stmt_bind_param($stmt, "ss", $nombre_usuario, $pass);
    mysqli_stmt_execute($stmt);

    // Redirigir al usuario a la página de inicio de sesión
    header('Location: inicio_sesion.php');
    exit;
}

?>
<style>
.btn-negro {
                background-color: black;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .formulario {
        margin: 50px auto;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,.1);
    }

    .formulario label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .formulario input[type="text"],
    .formulario input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 2px solid #ccc;
        border-radius: 5px;
        align-items: center;

        font-size: 16px;
    }

    .formulario input[type="submit"] {
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
    }

    .formulario input[type="submit"]:hover {
        background-color: #333;
    }

    .formulario p {
        margin-top: 10px;
        font-size: 16px;
        color: #008000;
    }




</style>
<!-- Mostrar el formulario de registro -->
<center>
<div class="formulario">
<form method="post">
    <label for="nombre_usuario">Nombre de usuario:</label>
    <input type="text" name="nombre_usuario" required>

    <label for="pass">Contraseña:</label>
    <input type="password" name="pass" required>

    <button type="submit" class="btn-negro">Registrarse</button>
</form>
</div>
<center>
    <!-- Creamos el footer y las columnas -->
    <footer style="position: relative; margin-top: 150px;left: 0;right: 0;" class="footer">
        <div class="columna">
            <h3>Sobre mi </h3>
            <br>
            <ul>
                
					
                <li><img width="30px" src="imgs/contactenos.png">
                <a href="contactos.php" style="text-decoration:none; color: white;">Contactos</a></li> 
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