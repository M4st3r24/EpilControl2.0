<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "registro";
$tbl_name = "register";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
else{
  echo "Conexión éxitosa";
}

$username = $_POST['user_mail'];
$password = $_POST['user_pass'];

echo "el correo es: $username<br>";
echo "la contraseña es: $password<br><br>"; 
 
$sql = "SELECT * FROM $tbl_name WHERE correo = '$username' ";
echo "<br>$sql";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
 $row = $result->fetch_array(MYSQLI_ASSOC); 
 echo("está entrando");
 if (password_verify($password, $row['pass'])) { 
 
 $_SESSION['loggedin'] = true;
 $_SESSION['username'] = $username;
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

 echo "Bienvenido! " . $_SESSION['username'];
 echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 

 } else { 
 echo "Username o Password estan incorrectos.";

 echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
}/*else{
    echo "Username o Password estan incorrectos.";

    echo "<br><a href='login.html'>Volver a Intentarlo</a>";
}*/
mysqli_close($conexion) 
?>