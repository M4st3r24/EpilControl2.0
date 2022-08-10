<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "registro";
 $tbl_name = "register";
 
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
 else{

 $query = "INSERT INTO register (correo,nombres,apaterno,amaterno,dia,mes,anio,pass)
 VALUES ('$_POST[mail]', '$_POST[name]','$_POST[apat]','$_POST[amat]','$_POST[dia]','$_POST[mes]','$_POST[anio]', '$_POST[password]')";

 if (!mysqli_query($conexion, $query))
 {
 die('Error: ' . mysqli_error());
 echo "<h5>"."Error al crear el usuario." . "<a href='registro.html'>"."<br />";
 }

 else {
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['name'] . "</h4>" . "<br><br>";
 echo "<h5>" . "Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 
   }
 }
 mysqli_close($conexion)
?>