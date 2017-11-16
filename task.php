<?php 
session_start();

$usuario=htmlspecialchars($_SESSION['user']['user_name']);


$mysqli  = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
$query =  "SELECT id FROM Usuarios WHERE nombre='".$usuario."'";

if ($result = $mysqli->query($query)) {

  
    $row = $result->fetch_row();


    printf ("<h2>El nombre del usuario es : [ %s ] <br>Id del usuario: [ %s ]</h2>", $usuario,$row[0]);
$_SESSION['id']=$row[0];

    /* librar resultados */
    $result->close();
}

/* cerrar conexión */
$mysqli->close();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tareas</title>
       <link rel="stylesheet" type="text/css" href="css/css1.css">
  </head>
  <body>
    <h1>Que accion deseas realizar??</h1>
  <a href="anadir.php">Añadir Tarea</a>
  <a href="Borrar.php">Borrar Tarea</a>
  <a href="Cambiarestado.php">Modificar Tarea</a>
    </form>
  </body>
</html>
