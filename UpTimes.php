<?php

 $host_db = "localhost";
 $user_db = "452273";
 $pass_db = "Contras1234!";
 $db_name = "452273";
 $tbl_name = "loging";
 
 $form_pass = $_POST['password'];
 
 /*$hash = password_hash($form_pass, PASSWORD_BCRYPT); */

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}else{
  echo "Conexión éxitosa";
}

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE correo = '$_POST[mail]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El correo ya ha sido registrado." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }