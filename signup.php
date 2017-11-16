<?php
  session_start();
  //echo hola ;
  include 'lib/head.php';

  try{


  if(isset($_POST) &&
    !empty($_POST['nom']) &&
    !empty($_POST['email']) &&
    !empty($_POST['pass1']) &&
    !empty($_POST['pass2'])&&
    !empty($_POST['dept'])&&
    $_POST['pass1']== $_POST['pass2'])

  {
      //guardar campos en variables
      $nom=htmlspecialchars($_POST['nom']);
      $email=htmlspecialchars($_POST['email']);
      //encriptar los password md5
      $pass=md5(htmlspecialchars($_POST['pass1']));
      $dept=htmlspecialchars($_POST['dept']);

//creamos una conexion
    $conn = new mysqli("localhost","dgonzalez_root","123123","dgonzalez_AC2");
    //muestra errores si los hay
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //INSERTAR USER: INSERT INTO `prueba`.`users` (`id`, `user_name`, `email`, `passwd`, `dept`) VALUES (NULL, 'pepe', 'pepe@pepe.com', '123', '1')
    //insertamos el user en la bbdd
    $sql="INSERT INTO `dgonzalez_AC2`.`Usuarios` (`id`, `nombre`, `email`, `password`, `Departamento`)VALUES(NULL, '".$nom."','".$email."','".$pass."','".$dept."')";
    //ejecutamos en la conexion que tenemos creeada la secuencia sql
    $res=$conn->query($sql);

      header("Location:index.php");
  }else{
    echo 'pass no coincide';
  }
}catch(Exception $e){
  echo 'Error:'.$e;
}

 ?>

     <form action="<?= $SERVER['PHP_SELF'];?>" method="post">
       <p>Nombre: <input type="text" name="nom"></p>
       <p>Email: <input type="email" name="email"></p>
       <p>Password: <input type="password" name="pass1"></p>
       <p>Repeat: <input type="password" name="pass2"></p>
       <p>Departamento: <input type="int" name="dept"></p>
       <input type="submit" name="enviar" value="enviar">
     </form>
   </body>
 </html>
