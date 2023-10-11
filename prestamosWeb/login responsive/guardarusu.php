<?php 

require 'clases/Db.class.php';
require 'clases/Conf.class.php';
require 'clases/Filtros_web.php';

$bd=Db::getInstance();

 
$nombre=FW::rem($_POST["nombre"]);


$sql ="INSERT INTO usuarios (cedula, nombre, email, login, password, tipo, codcentro, estado) VALUES ('$nombre','1')";

$stmt=$bd->ejecutar($sql);

if ($stmt==0){
	echo "0";
}else{
	echo "1";
}



 ?>