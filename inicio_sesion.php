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
	<title>REGISTRO</title>
    <link rel="shortcut icon" href="imgs/usuario-de-perfil.png">
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
                <li><a href="Restaurante.php">Restarurantes</a>
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
    // Mostrar el nombre del usuario, botón de gestionar restaurantes y botón de cerrar sesión
    echo '<div>
                <p>Bienvenido, '.$_SESSION['nombre_usuario'].'</p>
                <li><a href="gestionarRestaurante.php" class="btn">Gestionar Restaurante</a></li>
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
<?php
$error_msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuario where nombre_usuario='" . $username ."' AND pass='" . $password . "'";
    $result = mysqli_query($con,$sql);

    $row=mysqli_fetch_array($result);

    if ($row && $row['tipo_usuario']=="0") {
        $_SESSION["nombre_usuario"] = $username;
        header("Location:proyecto.php");
    } else {
        $error_msg = "Usuario o contraseña incorrectos";
    }
}
?>
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
    .formulario a {
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;

    }
    .formulario a:hover {
        background-color: #333;
    }
    .error-msg {
    color: red;
    font-weight: bold;
    text-align: center;
    margin: 10px 0;
}



</style>
 <center>
        <br><br><br><br>
        <div class="formulario">
            <form method="POST" action="#">
                <div>
                    <label>Nombre de Usuario</label>
                    <input type="text"  name="username" required>
                </div>
                <br><br>
                <div>
                    <label>Contraseña</label>
                    <input type="password"  name="password" required>
                </div>
                <br><br>
                <div>
                    <input type="submit" class="btn-negro" name="Login" value="ENTRAR">
                    <a href="registro.php" style="text-decoration:none" class="btn-negro">REGISTRO</a>
                </div>
                <div class="error-msg"><?php echo $error_msg ?></div>
                <br><br>
            </form>

        </div>
        <br><br><br><br>
</center>
    <!-- Creamos el footer y las columnas -->
    <footer class="footer">
        <div class="columna">
            <h3>Sobre mi</h3>
            <br>
            <ul>
                <li><img width="30px" src="imgs/contactenos.png">
                <a href="contactos.php" style="text-decoration:none; color: white;">Contactos</a></li> 
            </ul>
        </div>
        <div class="columna">
            <h3>Siguenos:</h3>
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