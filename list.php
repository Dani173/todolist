<?php
session_start();
//echo hola ;
include 'lib/head.php';

try{
  $stmt=$conn->prepare("SELECT t.id,t.descr,t.data,t.completed FROM users LEFT JOIN tasks t ON  t.user=users.id WHERE users.email=?");
  var_dump($conn->error_list);
  $stmt->bind_param('s',$SESSion['email']);
  $stmt->execute();
  $stmt->bind_result($id,$desc,$dates,$completed);


}catch(Exception $e){
  echo $e->getMessage();
}
?>
