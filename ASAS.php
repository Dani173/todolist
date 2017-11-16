<?php 
session_start();

$mysqli  = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
$query =  "SELECT * FROM Tareas WHERE user='".$_SESSION['id']."'";

printf (' <table id="tab1"> ');

if ($result = $mysqli->query($query)) {
	 printf (" <h1>TUS TAREAS ACTUALES</h1>");
	 printf (' <tr ><td class="sup">ID </td><td class="sup">Nombre</td><td class="sup">Fecha Fin</td><td class="sup">Estado </td></tr>');
	 $row[0]=1;
for($cont=0;$row[0]!=NULL;$cont++){
  $result->data_seek($cont);
    $row = $result->fetch_row();

	
   
}
    $cont2=$cont-1;
    
    for($cont3=0;$cont3<$cont2;$cont3++){
  $result->data_seek($cont3);
    $row = $result->fetch_row();
       
	

     printf (' <tr ><td class="cont">%s</td><td class="cont">%s</td ><td class="cont">%s</td><td class="cont">%s</td>', $row[0],$row[4],$row[2],$row[1]);
	 printf ('<td><form><input type="button" value="BORRAR"></form></td></tr>');

    }

try {
  if(isset($_POST)&&
  !empty($_POST['nom']))
  {            
	  $nom=$_POST['nom'];
       $sql="DELETE  FROM Tareas WHERE id='".$nom."'";
  
    $res=$mysqli->query($sql);
	header("Location:task.php");
  }
}catch(Exception $e){
  echo 'Error:';
}



}

printf (" </table>");
?>


<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borrar Tarea</title>
<link rel="stylesheet" type="text/css" href="css/borrar.css">
</head>

<body>
<form action="<?= $SERVER['PHP_SELF'];?>" method="post">
  <p>Pon el id de la tarea que quieres borrar: <input type="text" name="nom"></p>
  <input type="submit" name="enviar" value="Borrar" id="boton">

  <a href="task.php">Exit</a>
 
</body>
</html>