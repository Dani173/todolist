<?php 
session_start();

  


$mysqli  = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
$query =  "SELECT * FROM Tareas WHERE user='".$_SESSION['id']."'";


printf (' <table id="tab1"> ');


 


if ($result = $mysqli->query($query)) {
	 printf (" <h1>FINALIZAR TAREAS</h1>");
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
	 printf ('<td><form><input type="submit"id="boton" name="chec%s" value="FINALIZAR"></form></td></tr>',$cont3);

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





printf (" </table>");

	$_SESSION['numchec']=$cont3;
  }
 for($cont5=0;$cont5<$_SESSION['numchec'];$cont5++){
	  if($_GET['chec'.$cont5.'']!=NULL){
          $result->data_seek($cont5);
          $row = $result->fetch_row();
          $sql="UPDATE Tareas SET estado='Finzalizada' WHERE id='". $row[0]."'";
           $res=$mysqli->query($sql);
	       header("Location:task.php");
      }

	  }
?>


<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borrar Tarea</title>
<link rel="stylesheet" type="text/css" href="css/borrar.css">
</head>

<body>

  <a href="task.php">Exit</a>
 
</body>
</html>