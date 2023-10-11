<?php 
require 'clases/Db.class.php';
require 'clases/Conf.class.php';
require 'clases/Filtros_web.php';

$bd=Db::getInstance();

$nombre=FW::rem($_POST["nombre1"]);
$codigo=FW::rem($_POST["codigo"]);


$sql ="UPDATE  centros set nombre ='$nombre' where codigo='$codigo'";

$stmt=$bd->ejecutar($sql);

if ($stmt==0){
	echo "0";
}else{
	echo "1";
}



 ?>