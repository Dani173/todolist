<?php
session_start();
include 'lib/head.php';
include 'lib/foot.php';


try {
  if(isset($_POST)&&
  !empty($_POST['nom']) &&
  !empty($_POST['pass']))
  {
       $nom=htmlspecialchars($_POST['nom']);
       $pass=md5(htmlspecialchars($_POST['pass']));
       $conn = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
       if ($conn->connect_errno) {
           echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
       }
       echo "DENTRO2";

      $sql="SELECT *FROM Usuarios WHERE nombre='".$nom."'&& password='".$pass."'";
      $res2=$conn->query($sql);

      var_dump($res2->num_rows);
//num row para saber cuantos valeres devuelve la sentencia sql
      if($res2->num_rows>=1)
      {

        //para meterte en la sesion que te han pasado
        $_SESSION['user']['passwd']=$pass;
        $_SESSION['user']['user_name']=$nom;
        header("Location:task.php");
      }else {
        echo "no existe el user";
      }
  }
} catch (Exception $e) {
  echo $e -> getMessage();
}


 ?>
<form action="<?= $SERVER['PHP_SELF'];?>" method="post">
  <p>Nombre: <input type="text" name="nom"></p>
  <p>Password: <input type="password" name="pass"></p>
  <input type="submit" name="enviar" value="enviar">
</form>
