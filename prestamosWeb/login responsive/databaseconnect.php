<?php
$servername = "localhost";
$database = "prestamos";
$username = "root";
$password = "admin";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully ";

//$consulta="SELECT * FROM `usuarios` WHERE `usuario` LIKE 'Andres' AND `contraseña` LIKE 'rooquito'";
//$consulta="SELECT COUNT(*) AS total_filas FROM usuarios WHERE `usuario` LIKE 'Andresi' AND `contraseña` LIKE 'rooquito'";
$consulta="select * from usuarios where usuario = 'Andres' and contrasena = 'rooquito';";
//$consulta="SELECT * FROM usuarios";
$resultado=mysqli_query($conn, $consulta);


$rows = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $rows[] = $row;
}
var_dump($resultado);
var_dump(count($row));



$row_cnt = mysqli_num_rows($resultado);
printf(" Result set has %d rows.\n", $row_cnt);
//filas=mysqli_num_rows($resultado);

//if($filas){
  
 //   header("location:home.php");
  
//}else{
    /*?>
    <?php
    include("loginvista.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php*/
//}

mysqli_close($conn);
?>