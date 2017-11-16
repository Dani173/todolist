<?php 
session_start();
$conn = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
try {
  if(isset($_POST)&&
  !empty($_POST['nom']) &&
  !empty($_POST['fecha'])&&
  !empty($_POST['list']))
  {
	  $nom=$_POST['nom'];
       $fecha=$_POST['fecha'];
	    $list=$_POST['list'];
		
		$sql="INSERT INTO `dgonzalez_AC2`.`Tareas` (`id`, `nombre`, `estado`, `fechaFin`, `user`)VALUES(NULL, '".$nom."','".$list."','".$fecha."','".$_SESSION['id']."')";
  
    $res=$conn->query($sql);
	header("Location:task.php");
  }
}catch(Exception $e){
  echo 'Error:';
}


?>


<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Añadir Tarea</title>
    <link rel="stylesheet" type="text/css" href="css/css1.css">
</head>

<body>
<form action="<?= $SERVER['PHP_SELF'];?>" method="post">
  <p>Nombre Tarea: <input type="text" name="nom"></p>
  <p>Fecha que finaliza: <input type="date" name="fecha"></p>
  <p>Estado:<SELECT NAME="list"> 
<OPTION > A La mitad 
<OPTION > Recien Comenzada 
    <OPTION > Por empezar 
</SELECT> </p>
  <input type="submit" name="enviar" value="Crear Tarea">
</form>
        <a href="task.php">Exit</a>
</body>
</html>
