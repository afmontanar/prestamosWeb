<?php 

require 'clases/Db.class.php';
require 'clases/Conf.class.php';
require 'clases/Filtros_web.php';

$bd=Db::getInstance();
$cedula=FW::rem($_POST["cedula"]);
$nombre=FW::rem($_POST["nombre"]);
$email=FW::rem($_POST["email"]);
$centros=FW::rem($_POST["centros"]);
$tipo=FW::rem($_POST["tipo"]);


$sql ="INSERT INTO usurios (cedula, nombre, email, codcentro, tipo, login, password) VALUES ('$cedula', '$nombre', '$email', '$centros', '$tipo', '$cedula', md5($cedula))";

$stmt=$bd->ejecutar($sql);

if ($stmt==0){
	echo "0";
}else{
	echo "1";
}
 ?>