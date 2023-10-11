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
	<title>Gestion de  Restaurantes</title>
    <link rel="shortcut icon" href="imgs/usuario-de-perfil.png">
    <!-- Importamos los estilos CSS -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
</head>
<body>
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
    // Mostrar el nombre del usuario, botón de gestionar juegos y botón de cerrar sesión
    echo '<div>
                <p>Bienvenido, '.$_SESSION['nombre_usuario'].'</p>
                <li><a href="gestionarRestaurante.php" class="btn">Gestionar Restaurantes</a></li>
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
            <!-- Creamos el formulario de búsqueda por nombre de juego -->
			
                            <br/>
                    </select>
                </div>
            </div>
		
		</div>
	</div>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    textarea {
        width: 100%;
        height: 100px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        padding: 6px 12px;
        resize: vertical;
    }
    button[type="submit"] {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    button[type="submit"]:hover {
        background-color: red;
    }
</style>
    <?php

$conexion = mysqli_connect("localhost", "root", "", "proyecto");
if (!$conexion) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener los restaurantes de la base de datos
$query = mysqli_query($conexion, "SELECT * FROM restaurante");
$restaurante = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Procesar la actualización del comentario
if (isset($_POST['id_restaurante']) && isset($_POST['comentarios'])) {
    $id_restaurante = $_POST['id_restaurante'];
    $comentarios = $_POST['comentarios'];
    
    // Actualizar el comentario en la base de datos
    $stmt = mysqli_prepare($conexion, "UPDATE restaurante SET comentarios = ? WHERE id_restaurante = ?");
    mysqli_stmt_bind_param($stmt, "si", $comentarios, $id_restaurante);
    mysqli_stmt_execute($stmt);

    // Guardar mensaje de éxito en una variable de sesión
    $_SESSION['success_message'] = 'Los comentarios se han guardado correctamente';
}
// Procesar la eliminación del restaurante
if (isset($_POST['eliminar_restaurante'])) {
    $id_restaurante = $_POST['id_restaurante'];
    
    // Eliminar el restaurante de la base de datos
    $stmt = mysqli_prepare($conexion, "DELETE FROM restaurante WHERE id_restaurante = ?");
    mysqli_stmt_bind_param($stmt, "i", $id_restaurante);
    mysqli_stmt_execute($stmt);

    // Guardar mensaje de éxito en una variable de sesión
    $_SESSION['success_message'] = 'El restaurante ha sido eliminado correctamente';
}

?>



<!-- Mostrar la tabla de restaurante y el formulario de actualización -->
<!-- Mostrar mensaje de éxito si existe -->
<?php if (isset($_SESSION['success_message'])): ?>
    <p><?= $_SESSION['success_message'] ?></p>
    <?php unset($_SESSION['success_message']) ?>
<?php endif ?>

<!-- Mostrar la tabla de restaurante y el formulario de actualización -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>direccion</th>
            <th>telefono</th>
            <th>Comentarios</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($restaurante as $restaurante): ?>
            <tr>
                <td><?= $restaurante['nombre'] ?></td>
                <td><?= $restaurante['direccion'] ?></td>
                <td><?= $restaurante['telefono'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_restaurante" value="<?= $restaurante['id_restaurante'] ?>">
                        <textarea name="comentarios"><?= $restaurante['comentarios'] ?></textarea>
                        <button type="submit">Guardar</button>
                    </form>
                </td>
                <td>
                <td>
                    <form method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar este restaurante?')">
                        <input type="hidden" name="id_restaurante" value="<?= $restaurante['id_restaurante'] ?>">
                        <button type="submit" name="eliminar_restaurante">Eliminar</button>
                    </form>
                </td>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
    <!-- Creamos el footer y las columnas -->
    <footer class="footer">
        <div class="columna">
            <h3>Sobre el proyecto</h3>
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