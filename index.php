<?php
$conn = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
if($conn->connect_errno){
  echo "Fallo al conectar MYSQL:(".$mysqli->connect_errno.")".$mysqli->connecterror;
}
echo $mysqli->host_info."\n";
$consulta="Select * from Usuarios";
$res=$conn->query($consulta);
/*var_dump($conn->error_list);*/
$row = $res->fetch_assoc();
/*var_dump($row);*/
echo "Nombre:".$row['nombre'];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
  </head>
  <body>
    <br><a href="signup.php"> Sign Up</a></br>
    <a href="singin.php">Sign In</a>
  </body>
</html>
